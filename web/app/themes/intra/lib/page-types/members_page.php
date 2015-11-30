<?php

class Members_Page_Type extends Papi_Page_Type
{

    public function meta()
    {
        return [
            'post_type'   => 'page',
            'name'        => __('Medlemssida','orasolv'),
            'description' => __('En sida som bara inloggade kan se','orasolv'),
        ];
    }

    public function register() {

        $this->remove([
            'commentstatusdiv',
        ]);

        $this->box( dirname(__FILE__) . '/parts/sidebar-modules.php' );

    }

}
