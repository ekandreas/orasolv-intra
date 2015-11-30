<?php

class Bars_Module_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Staplar för utvisning','orasolv'),
            'description' => __('Ett stapeldiagram visas ut med dina siffror','orasolv'),
            'template' => 'views.modules.bars',
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( dirname(__FILE__) . '/parts/diagram-yabcd.php' );

    }

}
