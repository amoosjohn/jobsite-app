
@extends('admin.layout.inside')
@section('content')

<div id="content" class="app-content box-shadow-1 box-radius-3" role="main">
    <!-- Header -->

    @include('admin.common.header')
    <!-- Main -->

	<div class="padding">
		<h3 class="text-md mb-4 _400">Dashboard Overview</h3>
		<div class="row">
			<div class="col-6 col-lg-4">
				<div class="box p-3 primary theme">
					<div class="d-flex">
						<span class="text-muted">Total Users</span>
					</div>
					<div class="py-3 text-center text-lg text-white">
						{{ $userCount  }}
					</div>
					<div class="d-flex">

					</div>
				</div>
			</div>




		</div>

        <?php if ( Session::get('permission') == 2 ): ?>
			<div class="row">
		        <div class="col-sm-12">
		        	<div class="box px-3">
		                <canvas id="booking-line-chart" data-plugin="chart"  class="chartjs-render-monitor" style="display: block; width: 1011px; height: 400px;"></canvas>
		            </div>
		        </div>
	        </div>
        <?php elseif ( Session::get('permission') == 1 ): ?>

        	<div class="row">
		        <div class="col-sm-12">
		        	<div class="box px-3">
		                <canvas id="revenue-line-chart" data-plugin="chart"  class="chartjs-render-monitor" style="display: block; width: 1011px; height: 400px;"></canvas>
		            </div>
		        </div>
	        </div>

        <?php endif ?>
	</div>
    <!-- Footer -->
    @include('admin.common.footer')
</div>

@endsection
@section('scripts')
<script src="{{ asset('libs/moment/min/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('libs/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('scripts/plugins/jquery.chart.js') }}"></script>
<script>

    <?php if ( Session::get('permission') == 2 ): ?>

		var checkins = $("#checkins").val();
		$('#booking-line-chart').chart(
	    {
	      type: 'line',
	      data: {
	          labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
	          datasets: [
	            {
	                label: "Monthly Check-In",
	                type: 'line',
	                data: "{{ implode(',', $monthlyCheckin) }}".split(','),
	                fill: true,
	                backgroundColor: hexToRGB(app.color.primary, 0.2),
	                borderColor: hexToRGB(app.color.primary, 1),
	                borderWidth: 2,
	                borderJoinStyle: 'miter',
	                pointBorderColor: hexToRGB(app.color.primary, 1),
	                pointBackgroundColor: '#fff',
	                pointBorderWidth: 2,
	                pointHoverRadius: 2,
	                pointHoverBackgroundColor: hexToRGB(app.color.primary, 1),
	                pointHoverBorderColor: '#fff',
	                pointHoverBorderWidth: 1,
	                pointRadius: 3
	            }
	          ]
	      },
	      options: {
	      }
	    });

    <?php elseif ( Session::get('permission') == 1 ): ?>

    	$('#revenue-line-chart').chart(
	    {
			type: 'line',
			data: {
			  	labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
			  	datasets: [
				    {
				        label: "$ Monthly Revenue",
				        type: 'line',
				        data: [0,0,0,0,0,0,0,0,0,0,0,0],
				        fill: true,
				        backgroundColor: hexToRGB(app.color.primary, 0.2),
				        borderColor: hexToRGB(app.color.primary, 1),
				        borderWidth: 2,
				        borderJoinStyle: 'miter',
				        pointBorderColor: hexToRGB(app.color.primary, 1),
				        pointBackgroundColor: '#fff',
				        pointBorderWidth: 2,
				        pointHoverRadius: 2,
				        pointHoverBackgroundColor: hexToRGB(app.color.primary, 1),
				        pointHoverBorderColor: '#fff',
				        pointHoverBorderWidth: 1,
				        pointRadius: 3
				    }
			  	]
			},
			options: {
			}
	    });

        <?php endif ?>


</script>
@endsection
