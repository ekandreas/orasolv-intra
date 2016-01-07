<?php

class Blogroll_Module_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Inläggslista','lobbykit'),
            'description' => __('Visar inlägg i en lista','lobbykit'),
            'template' => intra\Papi::template(),
            'thumbnail' => intra\Papi::thumbnail(),
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( __('Text','lobbykit'), [
                papi_property([
                    'slug'  => 'title',
                    'title' => __('Rubrik','lobbykit'),
                    'type'  => 'string',
                ]),
                papi_property([
                    'slug'  => 'excerpt_length',
                    'title' => __('Pufflängd','lobbykit'),
                    'description' => 'Antal bokstäver för varje text under rubriken',
                    'type'  => 'number',
                    'default' => '200',
                ]),
            ]
        );

    }

}