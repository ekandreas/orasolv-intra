<!DOCTYPE html>
<html> 

    <head>
    	@include('views.parts.head')
    </head>

    <body>

		@include('views.parts.header')

		<div class="container">
			<div class="row">
				<div class="col-md-3">
					&nbsp;
			    </div>
				<div class="col-md-3">
			        @yield('main')
			    </div>
				<div class="col-md-3">
					&nbsp;
			    </div>
	        </div>
        </div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>

		@include('views.parts.footer')

        @yield('custom_scripts')

    </body>

</html>