<?php
return  [

        'title' => __('Moduler för sidopanelen','lobbykit'),

        papi_property( [
            'slug'  => 'sidebar_modules_inherit',
            'title' => __('Ärv moduler från','lobbykit'),
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
            'title' => __('Moduler för sidopanel','lobbykit'),
            'description' => __('Vilka moduler ska listas på sidans sidopanel?','lobbykit'),
            'type'  => 'relationship',
            'settings' => [
                'post_type' => 'module',
            ]
        ]),

];
