<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/ekandreas/docker-bedrock/recipe.php';

include_once 'vendor/deployer/deployer/recipe/common.php';
include_once 'vendor/ekandreas/dipwpe/main.php';

env('remote.name','orasolvinfo');
env('remote.path','/mnt/persist/www/orasolv.info');
env('remote.ssh','root@c6889.cloudnet.se');
env('remote.database','orasolvinfo');
env('remote.domain','orasolv.info');
env('local.domain','intra.dev');
env('local.is_elastic',true);

server( 'development', 'intra.dev', 22 )
    ->env('deploy_path','/var/www/intra')
    ->env('branch', 'master')
    ->stage('development')
    ->user( 'vagrant', 'vagrant' );

server( 'production', 'c6889.cloudnet.se', 22 )
    ->env('deploy_path','/mnt/persist/www/orasolv.info')
    ->user( 'root' )
    ->env('branch', 'master')
    ->stage('production')
    ->identityFile();

set('repository', 'https://github.com/ekandreas/orasolv-intra');

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');
set('writable_dirs', ['web/app/uploads']);

task('deploy:restart', function () {
    run("rm -f web/app/uploads/.cache/*");
})->desc('Refresh cache');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:writable',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );


