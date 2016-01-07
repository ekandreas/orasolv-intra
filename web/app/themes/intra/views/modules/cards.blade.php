<?php 
	$link = papi_get_field( $module->ID, 'link') 
?>
<div class="thumbnail">
	@if( has_post_thumbnail( $module->ID ) )
		    {!! get_the_post_thumbnail( $module->ID, ['class'=>'img-rounded']) !!}
	@endif
	<div class="caption text-center">
		<h3>{!! get_the_title( $module->ID ) !!}</h3>
		<p>{!! papi_get_field( $module->ID, 'text' ) !!}</p>
		@if( $link )
			<p>
				<a href="{{ $link->url }}" class="btn btn-warning">{{ $link->title }}</a>
			</p>
		@endif
	</div>
</div>
