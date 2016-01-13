<?php

class Link_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'link',
            'name'        => __('Länkning','intra'),
            'description' => __('En länk','intra'),
        ];
    }

    public function remove( $post_type_supports = [] ) {
        return [
            'commentstatusdiv',
            'editor',
            'postimagediv',
            ];
    }
    
    public function register() {

        $this->remove([
            'commentstatusdiv',
            'editor',
            'postimagediv',
            ]);

        $this->box( 'Om länkning', [

            papi_property( [
                'slug' => 'link',
                'title' => __('Länk *','intra'),
                'type'  => 'link',
                'description' => 'Denna måste finnas med!'
            ] ),

            papi_property( [
                'slug' => 'image',
                'title' => __('Länkbild','intra'),
                'type'  => 'image',
                'description' => 'Frivillig bild för länkningen'
            ] ),

            papi_property( [
                'slug' => 'note',
                'title' => __('Intern notering','intra'),
                'type'  => 'string',
                'description' => 'Visas ej för användarna'
            ] ),

        ] );

    }

}
