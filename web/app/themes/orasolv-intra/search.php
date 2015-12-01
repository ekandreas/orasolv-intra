@layout('views.layouts.master')

@section('main')

		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
				  <div class="jumbotron-contents">
				  	<h1>{{ __('Sökresultat för ', 'orasolv') }} '<?=get_query_var('s')?>'</h1>

<ul>
	@while( have_posts() )
		<?php the_post() ?>
	    <li><a href="{{the_permalink()}}">{{the_title()}}</a></li>
	@endwhile
</ul>

				  </div>
				</div>
			</div>
		</div>
        
@endsection

@section('sidebar')
	@include( 'views.layouts.sidebar' )
@endsection



