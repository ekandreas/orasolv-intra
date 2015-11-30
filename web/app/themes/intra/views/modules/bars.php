<?php
	global $post;
	$post = get_post( $module->ID );
	setup_postdata( $post );
?>
<div class="row">

	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ get_the_title() }}</h3>
			</div>
			<div class="panel-body">

				<div id="bars-{{ $module->ID }}" style="height: 250px;"></div>

				{{ get_the_content() }}
			</div>
        </div>
		
	</div>

</div>

<script>

	jQuery( document ).ready(function($) {

		new Morris.Bar({
		  element: 'bars-{{ $module->ID }}',
		  data: [
		  	@foreach( papi_get_field('data_yabcd') as $key => $data )
		  		@if( $key ) 
		  		,
		  		@endif
			    { y: '{{ $data['y'] }}', a: {{ $data['a'] }}, b: {{ $data['b'] }},c: {{ $data['c'] }},d: {{ $data['d'] }}  }
		  	@endforeach
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b', 'c', 'd' ],
		  labels: [ '{{ papi_get_field('a_name') }}','{{ papi_get_field('b_name') }}','{{ papi_get_field('c_name') }}','{{ papi_get_field('d_name') }}' ]
		});

	});

</script>

<?php

wp_reset_postdata( $post );
