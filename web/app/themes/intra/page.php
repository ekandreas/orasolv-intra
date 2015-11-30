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

