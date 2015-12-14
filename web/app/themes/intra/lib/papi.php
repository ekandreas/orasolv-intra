<?php
namespace intra;

class Papi
{
    function __construct()
    {

        add_filter( 'papi/settings/directories', function ( $directories ) {
            $directories[] = dirname(__FILE__) . '/page-types';
            return $directories;
        } );

    }

    static function is_papi_page() {
        return !!\papi_get_page_type_id();
    }


    static function template() {

        $result = '';

        list(, $caller) = debug_backtrace(false);
        $class = strtolower( $caller['class'] );

        if( strpos( $class, '_page_' ) ) {
            $class = str_replace('_page_type', '', $class);
            $class = str_replace('_', '-', $class);
            $result = 'views.pages.' . $class;
        }
        else if( strpos( $class, '_module_' ) ) {
            $class = str_replace('_module_type', '', $class);
            $class = str_replace('_', '-', $class);
            $result = 'views.modules.' . $class;
        }
        else {

        }

        return $result;
    }

    static function thumbnail() {

        $result = '';

        list(, $caller) = debug_backtrace(false);
        $class = strtolower( $caller['class'] );

        if( strpos( $class, '_page_' ) ) {
            $class = str_replace('_page_type', '', $class);
            $class = str_replace('_', '-', $class);
            $result = get_stylesheet_directory_uri() . "/assets/images/pages/$class.png";
        }
        else if( strpos( $class, '_module_' ) ) {
            $class = str_replace('_module_type', '', $class);
            $class = str_replace('_', '-', $class);
            $result = get_stylesheet_directory_uri() . "/assets/images/modules/$class.png";
        }
        else {

        }

        return $result;
    }
    
    static function render_modules( $property_slug ) {
        $relations = papi_get_field( $property_slug );
        if( $relations ) {
            foreach ($relations as $key => $relation) {

                $blade_template = rtrim( papi_get_page_type_template( $relation->ID ), '.php' );

                $view = view( $blade_template, [ 'module' => papi_get_page($relation->ID) ] );
                $pathToCompiled = $view->path;

                include $pathToCompiled;

            }
        }

    }


}

new Papi();
