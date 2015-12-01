<?php
return  [

        'title' => __('Data för diagrammet','orasolv'),

        papi_property([
            'slug'  => 'a_name',
            'title' => __('Etikett A','orasolv'),
            'description' => __('Namn för X-led A','orasolv'),
            'type'  => 'string',
        ]),
        papi_property([
            'slug'  => 'b_name',
            'title' => __('Etikett B','orasolv'),
            'description' => __('Namn för X-led B','orasolv'),
            'type'  => 'string',
        ]),
        papi_property([
            'slug'  => 'c_name',
            'title' => __('Etikett C','orasolv'),
            'description' => __('Namn för X-led C','orasolv'),
            'type'  => 'string',
        ]),
        papi_property([
            'slug'  => 'd_name',
            'title' => __('Etikett D','orasolv'),
            'description' => __('Namn för X-led D','orasolv'),
            'type'  => 'string',
        ]),

        papi_property([
            'slug'  => 'data_yabcd',
            'title' => __('y-a-b-c-d','orasolv'),
            'description' => __('Datapunkter för diagrammet','orasolv'),
            'type'  => 'repeater',
            'settings' => [
                'items' => [
                    papi_property( [
                        'type'  => 'string',
                        'title' => __('Y-axel','orasolv'),
                        'slug'  => 'y',
                    ] ),
                    papi_property( [
                        'type'  => 'number',
                        'title' => __('A-data','orasolv'),
                        'slug'  => 'a',
                    ] ),
                    papi_property( [
                        'type'  => 'number',
                        'title' => __('B-data','orasolv'),
                        'slug'  => 'b',
                    ] ),
                    papi_property( [
                        'type'  => 'number',
                        'title' => __('C-data','orasolv'),
                        'slug'  => 'c',
                    ] ),
                    papi_property( [
                        'type'  => 'number',
                        'title' => __('D-data','orasolv'),
                        'slug'  => 'd',
                    ] ),
                ]
            ]
        ]),

];
