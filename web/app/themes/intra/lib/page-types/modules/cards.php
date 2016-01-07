<?php

class Cards_Module_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Kort','lobbykit'),
            'description' => __('Ett enkelt kort med länkknapp','lobbykit'),
            'template' => intra\Papi::template(),
            'thumbnail' => intra\Papi::thumbnail(),
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( __('Kortknapp','lobbykit'), [
                papi_property([
                    'slug'  => 'link_title',
                    'title' => __('Länknamn','lobbykit'),
                    'type'  => 'string',
                ]),
                papi_property([
                    'slug'  => 'link_url',
                    'title' => __('Länkadress','lobbykit'),
                    'type'  => 'string',
                ]),
            ]
        );

    }

}
