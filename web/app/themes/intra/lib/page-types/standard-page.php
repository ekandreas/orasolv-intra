<?php

class Standard_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'page',
            'name'        => __('Standardsida','intra'),
            'description' => __('En standardsida (moduler) med en innehållskolumn och en mindre sidokolumn','intra'),
            'template' => intra\Papi::template(),
            'thumbnail' => intra\Papi::thumbnail(),
        ];
    }

    public function remove( $post_type_supports = [] ) {
        return [
            'commentstatusdiv',
            'editor',
            ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
            'editor',
            ]);

        $this->box( 'Rad 1', [
            papi_property( [
                'slug' => 'modules_container_row1_col1',
                'title' => __('Kolumn 1','intra'),
                'description' => 'Hämtar modul och visar dess funktion',
                'type'  => 'relationship',
                'settings' => [
                    'post_type' => 'module',
                ],
            ] ),
            papi_property( [
                'slug' => 'modules_container_row1_col2',
                'title' => __('Kolumn 2','intra'),
                'description' => 'Hämtar modul och visar dess funktion',
                'type'  => 'relationship',
                'settings' => [
                    'post_type' => 'module',
                ],
            ] ),
        ] );

    }

}
