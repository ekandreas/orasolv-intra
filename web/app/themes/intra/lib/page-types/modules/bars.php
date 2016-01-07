<?php

class Bars_Module_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Staplar för utvisning','lobbykit'),
            'description' => __('Ett stapeldiagram visas ut med dina siffror','lobbykit'),
            'template' => intra\Papi::template(),
            'thumbnail' => intra\Papi::thumbnail(),
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( dirname(__FILE__) . '/parts/diagram-yabcd.php' );

    }

}
