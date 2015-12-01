<?php
return  [

        'title' => __('Moduler för sidopanelen','orasolv'),

        papi_property( [
            'slug'  => 'sidebar_modules_inherit',
            'title' => __('Ärv moduler från','orasolv'),
            'type'  => 'post',
            'settings' => [
                'post_type' => 'page',
                'placeholder' => 'Inget arv valt för sidopanel',
            ],
            'default' => (int)get_option('page_on_front'),
            'description' => 'Hämtar moduler från angiven sida istället för nedanstående lista',
        ] ),

        papi_property([
            'slug'  => 'sidebar_modules',
            'title' => __('Moduler för sidopanel','orasolv'),
            'description' => __('Vilka moduler ska listas på sidans sidopanel?','orasolv'),
            'type'  => 'relationship',
            'settings' => [
                'post_type' => 'module',
            ]
        ]),

];
