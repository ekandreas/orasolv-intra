<?php

/**
 * Add <body> classes
 */
function sage_body_class($classes)
{
    // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
      if (!in_array(basename(get_permalink()), $classes)) {
          $classes[] = basename(get_permalink());
      }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
      $classes[] = 'sidebar-primary';
  }

    return $classes;
}
add_filter('body_class', 'sage_body_class');

add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');

function get_post_excerpt($post_or_post_id=null, $length = 150, $add_read_more=false)
{
    $post   = null;
    $result = "";

    if (!$post_or_post_id) {
        $post_or_post_id = get_the_ID();
    }

    if (is_object($post_or_post_id)) {
        $post = $post_or_post_id;
    } elseif (is_numeric($post_or_post_id)) {
        $post = get_post($post_or_post_id);
    } else {
        return ''; //throw new Exception( '### Error in VcModule/get_post_excerpt, no post nor post_id given! ###' );
    }

    $excerpt = html_entity_decode($post->post_excerpt);
    if (empty($excerpt)) {
        $excerpt = html_entity_decode(strip_tags($post->post_content));
    }

    if (strlen($excerpt) > $length) {
        $line=$excerpt;
        if (preg_match('/^.{1,' . $length . '}\b/s', $excerpt, $match)) {
            $line=$match[0];
        }

         $excerpt = $line . '...';
    }

    if( $add_read_more ) $excerpt .= '<br/>Läs mer!';

    return wp_kses_post($excerpt);
}
