<div class="row">

	<div class="col-md-12">

		<?php 
			$length = (int)papi_get_field( $module->id, 'excerpt_length' );
			$args=['post_type'=>'post'];
			$the_query = new WP_Query( $args );
		?>
		@if( $the_query->have_posts() )
			@if( $title=papi_get_field( $module->id, 'title' ) )
				<h2>{{ $title }}</h2>
			@endif
			@while ( $the_query->have_posts() )
				{{ $the_query->the_post() }}
				@if( members_can_current_user_view_post() )
					<h3>{{ the_title() }}</h3>
					{!! get_post_excerpt( get_the_ID(), $length, false) !!}
					<br/>
					<a href="{{ get_permalink() }}">Läs mer!</a>
				@endif
			@endwhile
		@endif
		{{ wp_reset_postdata() }}

	</div>

</div>