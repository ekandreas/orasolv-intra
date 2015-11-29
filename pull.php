<?php

task( 'pull:dump', function () {

    writeln( 'Creating a new database dump (approx. 60s)' );
    run( 'mysqldump orasolvinfo > /tmp/orasolvinfo.sql' );

} );

task( 'pull:fetch_dump', function () {

    writeln( 'Getting database dump (approx. 60s)' );
    runLocally( 'scp root@139.162.141.89:/tmp/orasolvinfo.sql orasolvinfo.sql', 999 );

} );

task( 'pull:resolve_dump', function () {

    writeln( 'Restore database inside vagrant (approx. 60s)' );
    runLocally( 'vagrant ssh -c "mysql -u root -proot orasolvinfo < /var/www/intra/orasolvinfo.sql"', 999 );

} );

task( 'pull:set_vagrant_wp', function () {

    writeln( 'Restore wp after pull (approx. 60s)' );
    runLocally( 'vagrant ssh -c "cd /var/www/intra/web && wp search-replace orasolv.info intra.dev && wp rewrite flush"', 999 );
    runLocally( 'vagrant ssh -c "cd /var/www/intra/web && wp search-replace www.orasolv.info intra.dev && wp rewrite flush"', 999 );

} );

task( 'pull:uploads', function () {

    writeln( 'Getting uploads, long duration first time! (approx. 60-999s)' );
    runLocally( 'rsync -re ssh root@139.162.141.89:/mnt/persist/www/orasolv.info/shared/web/app/uploads web/app', 999 );

} );

task( 'pull:cleanup', function () {

    writeln( 'Cleaning up locally...' );
    runLocally( 'rm orasolvinfo.sql' );

} );

task( 'pull', [
    'pull:dump',
    'pull:fetch_dump',
    'pull:resolve_dump',
    'pull:set_vagrant_wp',
    'pull:uploads',
    'pull:cleanup',
] );