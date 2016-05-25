<?php

class Media_Attachment_Type extends Papi_Attachment_Type {

  /**
   * The type meta options.
   *
   * @return array
   */
  public function meta() {
    return [
      'name' => 'Attachment'
    ];
  }

  /**
   * Register content meta box.
   */
  public function register() {
    $this->box( 'Dokumentlistningar', [
      papi_property( [
        'title' => 'Relation',
        'slug'  => 'relation',
        'type'  => 'relationship'
      ] ),
      papi_property( [
        'title' => 'Ordning',
        'slug'  => 'sort_order',
        'type'  => 'number',
        'description' => 'Lägst går först i listningar',
        'default' => '100',
      ] )
    ] );
  }
}