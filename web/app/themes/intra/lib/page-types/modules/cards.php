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

    public function remove() {
        return [
            'commentstatusdiv',
        ];
    }

    public function register() {

        $this->box( __('Text','lobbykit'), [
                papi_property([
                    'slug'  => 'text',
                    'title' => __('Innehåll','lobbykit'),
                    'type'  => 'editor',
                ]),
            ]
        );

        $this->box( __('Kortknapp','lobbykit'), [
                papi_property([
                    'slug'  => 'link',
                    'title' => __('Länk','lobbykit'),
                    'type'  => 'link',
                ]),
            ]
        );

    }

}
