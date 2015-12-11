<?php
	global $post;
	$post = get_post( $module->ID );
	setup_postdata( $post );
?>
<div class="thumbnail">
	@if( has_post_thumbnail() )
		    {{ the_post_thumbnail(['class'=>'img-rounded']) }}
	@endif
	<div class="caption text-center">
		<h3>{{ the_title() }}</h3>
		<p>{{ the_content() }}</p>
		<p>
			<a href="{{ papi_get_field('link_url') }}" class="btn btn-warning" role="button">{{ papi_get_field('link_title') }}</a>
		</p>
	</div>
</div>

<?php

wp_reset_postdata( $post );