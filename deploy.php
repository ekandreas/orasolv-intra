<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/deployer/deployer/recipe/common.php';
include_once 'pull.php';

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