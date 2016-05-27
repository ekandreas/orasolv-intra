<div class="row">

	<div class="col-md-12">

		<?php 
            $args = [
            	'post_type'=>'attachment',
            	'meta_query' => [
            		[
		            	'key' => 'relation',
		            	'value' => $module->id,
		            	'compare' => 'LIKE'
            		]
            	],
            ];
            $medialist = get_posts($args);
        ?>
		@if( $medialist )
			<h3>{{ papi_get_field($module->id, 'title') }}</h3>
			<p>{!! papi_get_field($module->id, 'body') !!}</p>
			@foreach($medialist as $media)
				<p>
					<a href="{{ $media->guid }}">{{ $media->post_title }}</a>
				</p>
			@endforeach
		@endif
		{{ wp_reset_postdata() }}

	</div>

</div>