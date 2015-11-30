<?php
/**
 * Options General Type for theme with Papi
 * Andreas Ek, 2015-11-30
 */
class Options_General_Type extends Papi_Option_Type
{

    /**
     * Where to register the option page to show
     * @return []
     */
    public function meta()
    {
        return [
            'menu' => 'options-general.php',
            'name' => __('Orasolv','orasolv'),
        ];
    }

    /**
     * Registers meta boxes to papi page type
     * @return void
     */
    public function register()
    {
        $this->box('Access', [

            papi_property([
                'slug'  => 'domains',
                'title' => __('Tillåtna e-post-domäner','orasolv'),
                'description' => __('Funktion för skapa konto via e-post. Lägg inte med @ i domännamnet.','orasolv'),
                'type'  => 'repeater',
                'settings' => [
                    'items' => [
                        [
                        'slug' => 'domain',
                        'type' => 'string',
                        ]
                    ]
                ]
            ]),

        ]);
    }

}