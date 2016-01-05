<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/deployer/deployer/recipe/common.php';

server( 'development', 'intra.dev', 22 )
    ->env('deploy_path','/var/www/intra')
    ->env('branch', 'master')
    ->stage('development')
    ->user( 'vagrant', 'vagrant' );

server( 'production', '139.162.141.89', 22 )
    ->env('deploy_path','/mnt/persist/www/orasolv.info')
    ->user( 'root' )
    ->env('branch', 'master')
    ->stage('production')
    ->identityFile();

set('repository', 'https://github.com/ekandreas/orasolv-intra');

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads','web/app/themes/intra/.cache']);
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');

task('deploy:restart', function () {
    writeln('Purge cache...');
    //run("curl -s http://www.skolporten.se/wp/wp-admin/admin-ajax.php?action=purge");
})->desc('Restarting apache2 and varnish');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );

task( 'init:wp', function () {

    writeln( 'Initialize WP to get WP-CLI working' );
    runLocally( 'cd web && wp core install --url=http://something.dev --title=wp --admin_user=admin --admin_password=admin --admin_email=arne@nada.se' );

} );

task( 'init:pull', function () {

    writeln( 'Pull remote version of WP' );
    runLocally( 'dep pull production' );

} );

task( 'init', [
    'init:wp',
    'init:pull',
] );


task( 'pull:database', function () {

    writeln( 'Creating a new database dump on the remote server' );
    run( 'mysqldump orasolvinfo > /tmp/orasolvinfo.sql' );
    writeln( 'Getting database dump from the remote server' );
    runLocally( 'scp root@139.162.141.89:/tmp/orasolvinfo.sql orasolvinfo.sql' );
    writeln( 'Restore remote database to local database' );
    runLocally( 'cd web && wp db import ../orasolvinfo.sql' );
    writeln( 'Search and replace urls in the imported database to local urls' );
    runLocally( 'cd web && wp search-replace www.orasolv.info intra.dev' );
    runLocally( 'cd web && wp search-replace orasolv.info intra.dev' );

} );

task( 'pull:files', function () {

    writeln( 'Getting uploads, long duration first time! (approx. 60s)' );
    runLocally( 'rsync -re ssh root@139.162.141.89:/mnt/persist/www/orasolv.info/shared/web/app/uploads web/app' );

} );

task( 'pull:elastic', function () {

    writeln( 'Setup elasticsearch and elasticpress' );
    runLocally( 'cd web && wp elasticpress index --setup' );

} );

task( 'pull:cleanup', function () {

    writeln( 'Cleaning up locally...' );
    runLocally( 'rm orasolvinfo.sql' );
    writeln( 'Permalinks rewrite/flush' );
    runLocally( 'cd web && wp rewrite flush' );
    writeln( 'Activate query monitor' );
    runLocally( 'cd web && wp plugin activate query-monitor' );

} );

task( 'pull', [
    'pull:database',
    'pull:files',
    'pull:elastic',
    'pull:cleanup',
] );

