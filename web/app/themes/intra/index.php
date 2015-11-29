@layout('views.layouts.master')

@section('main')

	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
			  <div class="jumbotron-photo"><img src="{{ Roots\Sage\Assets\asset_path('images/office.jpg') }}"></div>
			  <div class="jumbotron-contents">
			    <h1>Orasolv Intranät</h1>
			    <h2>Testar</h2>
			    <p>Det här är bara ett test för att se att det kommer ut något på sidorna.</p>
			  </div>
			</div>
		</div>
	</div>
        
@endsection

@section('sidebar')
	<div class="row">
		<div class="col-md-12">
		      <div class="thumbnail">
				<div id="myfirstchart" style="height: 250px;"></div>
				<div class="caption text-center">
				  <h3>Senaste rapporten</h3>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
				  <p><a href="#" class="btn btn-info" role="button">Mer info</a> <a href="#" class="btn btn-success" role="button">Uppfattat!</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		      <div class="thumbnail">
				<div id="bar-example" style="height: 250px;"></div>
				<div class="caption text-center">
				  <h3>Hur går det?</h3>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
				  <p><a href="#" class="btn btn-info" role="button">Mer info</a> <a href="#" class="btn btn-success" role="button">Uppfattat!</a></p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('custom_scripts')
	<script>

		jQuery( document ).ready(function($) {

				new Morris.Bar({
				  element: 'bar-example',
				  data: [
				    { y: '2009', a: 100, b: 90 },
				    { y: '2010', a: 75,  b: 65 },
				    { y: '2011', a: 50,  b: 40 },
				    { y: '2012', a: 75,  b: 65 },
				    { y: '2013', a: 50,  b: 40 },
				    { y: '2014', a: 75,  b: 65 },
				    { y: '2015', a: 100, b: 90 }
				  ],
				  xkey: 'y',
				  ykeys: ['a', 'b'],
				  labels: ['Series A', 'Series B']
				});

				new Morris.Line({
				  // ID of the element in which to draw the chart.
				  element: 'myfirstchart',
				  // Chart data records -- each entry in this array corresponds to a point on
				  // the chart.
				  data: [
				    { year: '2008', value: 20 },
				    { year: '2009', value: 10 },
				    { year: '2010', value: 5 },
				    { year: '2011', value: 5 },
				    { year: '2012', value: 20 }
				  ],
				  // The name of the data record attribute that contains x-values.
				  xkey: 'year',
				  // A list of names of data record attributes that contain y-values.
				  ykeys: ['value'],
				  // Labels for the ykeys -- will be displayed when you hover over the
				  // chart.
				  labels: ['Value']
				});
		});
	
	</script>
@endsection