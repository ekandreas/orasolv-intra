<?php
namespace intra;

class Cpt
{
    function __construct()
    {
        add_action( 'init', function () {

            //if( !function_exists('register_extended_post_type') ) {
            //    include_once( $_SERVER['DOCUMENT_ROOT'] . '/../vendor/johnbillion/extended-cpts/extended-cpts.php');
            //}

            if( function_exists('register_extended_post_type') ) {

                register_extended_post_type( 'module', [
                    'has_archive' => false,
                    'show_ui' => true,
                    'show_in_menu' => 'edit.php?post_type=page',
                    'show_in_feed' => false,
                    'supports' => array( 'title', 'thumbnail' ),
                    'labels' => [
                        'name'                  => __('Moduler','intra'),
                        'singular_name'         => __('Modul','intra'),
                        'menu_name'             => __('Moduler','intra'),
                        'name_admin_bar'        => __('Modul','intra'),
                        'add_new'               => __('Skapa ny','intra'),
                        'add_new_item'          => __('Skapa ny modul','intra'),
                        'edit_item'             => __('Ändra modul','intra'),
                        'new_item'              => __('Ny modul','intra'),
                        'view_item'             => __('Visa modul','intra'),
                        'search_items'          => __('Sök moduler','intra'),
                        'not_found'             => __('Inga moduler funna','intra'),
                        'not_found_in_trash'    => __('Inga moduler i papperskorg','intra'),
                        'parent_item_colon'     => __('Modulförälder:','intra'),
                        'all_items'             => __('Moduler','intra'),
                        'archives'              => __('Modularkiv','intra'),
                        'insert_into_item'      => __('Lägg till i modul','intra'),
                        'uploaded_to_this_item' => __('Uppladdat till modul','intra'),
                        'filter_items_list'     => __('Filtrera modullistan','intra'),
                        'items_list_navigation' => __('Listnavigering','intra'),
                        'items_list'            => __('Modullista','intra'),
                    ],
                ], [
                    'singular' => __('Modul','intra'),
                    'plural'   => __('Moduler','intra'),
                ] );

            }

        } );
    }

}

new Cpt();
