<?php $modules = papi_get_field( get_the_ID(), 'sidebar_modules'); ?>
@if( $modules )
	@foreach( $modules as $module )
		
		@if( members_can_current_user_view_post( $module->ID ) )
			@include( rtrim( papi_get_page_type_template($module->ID), '.php' ), ['module'=>$module] )
		@endif

	@endforeach
@endif
