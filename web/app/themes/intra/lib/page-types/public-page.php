<?php

class Public_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'page',
            'name'        => __('Publik sida','lobbykit'),
            'description' => __('En sida som alla kan komma åt och se','lobbykit'),
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( dirname(__FILE__) . '/parts/sidebar-modules.php' );

    }

}
