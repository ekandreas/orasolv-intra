<?php
namespace lobbykit;

class Cpt
{
    function __construct()
    {
        add_action( 'init', function () {

            if( function_exists('register_extended_post_type') ) {

                register_extended_post_type( 'module', [
                    'has_archive' => false,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'show_in_feed' => false,
                    'supports' => array( 'title', 'thumbnail' ),
                ], [
                    'singular' => __('Modul','lobbykit'),
                    'plural'   => __('Moduler','lobbykit'),
                ] );
            }

        } );
    }

}

new Cpt();
