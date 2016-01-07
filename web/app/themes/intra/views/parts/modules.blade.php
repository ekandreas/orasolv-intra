@if( $modules = papi_get_field( get_the_ID(), $slug ) )
	@foreach( $modules as $module )
		<?php 
		if( members_can_current_user_view_post( $module->ID ) ) {
			?>
			@include( rtrim( papi_get_page_type_template($module->ID), '.php' ), [ 'module' => papi_get_page($module->ID) ] )
			<?php
		}
		?>
	@endforeach
@endif
