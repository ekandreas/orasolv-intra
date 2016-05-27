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
					<?php
						$meta = wp_get_attachment_metadata($media->ID);
						$size = round(filesize(get_attached_file($media->ID)) / 1024);
						if($size>1024) {
							$size = round($size/1024,1) . 'MB';
						} else {
							$size = $size . 'kB';
						}
					?>
					<a href="{{ $media->guid }}" download><i class="fa fa-download" aria-hidden="true"></i> {{ $media->post_title }} ({{ $size }})</a>
				</p>
			@endforeach
		@endif
		{{ wp_reset_postdata() }}

	</div>

</div>