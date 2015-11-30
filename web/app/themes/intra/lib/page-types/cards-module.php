<?php

class Cards_Module_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Kort','orasolv'),
            'description' => __('Ett enkelt kort med länkknapp','orasolv'),
            'template' => 'views.modules.cards',
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( __('Kortknapp','orasolv'), [
                papi_property([
                    'slug'  => 'link_title',
                    'title' => __('Länknamn','orasolv'),
                    'type'  => 'string',
                ]),
                papi_property([
                    'slug'  => 'link_url',
                    'title' => __('Länkadress','orasolv'),
                    'type'  => 'string',
                ]),
            ]
        );

    }

}
