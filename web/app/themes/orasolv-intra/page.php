@layout('views.layouts.master')

@section('main')

	@while( have_posts() )
		<?php the_post() ?>
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
					@if( has_post_thumbnail() )
						<div class="jumbotron-photo">
						    {{ the_post_thumbnail() }}
						</div>
					@endif
				  <div class="jumbotron-contents">
				  	@if( !is_front_page() )
				  		<h1>{{ the_title() }}</h1>
				  	@endif
				  	{{ the_content() }}
				  </div>
				</div>
			</div>
		</div>
	@endwhile
        
@endsection

@section('sidebar')
	@include( 'views.layouts.sidebar' )
@endsection

