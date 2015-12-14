<?php

$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/admin_menu.php',
  'lib/cpt.php',
  'lib/papi.php',
];

if(function_exists('blade_set_storage_path')){
    blade_set_storage_path( dirname( __FILE__ ) . '/.cache' );
}

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
