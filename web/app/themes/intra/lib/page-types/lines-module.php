<?php

class Lines_Module_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'module',
            'name'        => __('Linjediagram för utvisning','lobbykit'),
            'description' => __('Ett linjediagram visas ut med dina siffror','lobbykit'),
            'template' => 'views.modules.lines',
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( dirname(__FILE__) . '/parts/diagram-yabcd.php' );

    }

}
