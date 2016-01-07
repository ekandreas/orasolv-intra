@extends('views.layouts.module')

@section('main')

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	@include( rtrim( papi_get_page_type_template(get_the_ID()), '.php' ), ['module'=>$post] )


@endsection