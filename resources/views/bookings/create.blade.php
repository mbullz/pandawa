@extends('layouts.app')

@section('page_title')
	New Booking
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Bookings</a></li>
	<li class="active">Create</li>
@endsection

@section('content')
	
	<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Choose Date &amp; Time</strong>
                </div>
                <div class="card-body">
                	@foreach ($dates as $row)
                		<button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.location='/bookings/create/{{ $row }}'">
	                		<i class="fa fa-calendar"></i>&nbsp; {{ $row }}
	                	</button>
	                	&nbsp;
					@endforeach

					<br /><br /><br />
					
					<h3>Date : {{ $date }}</h3>
					<br />
					<form method="POST" action="/bookings">
						{{ csrf_field() }}
						<input type="hidden" name="date" value="{{ $date }}" />

						<div class="row form-group">
							<div class="col col-md-1"><label class=" form-control-label">Time :</label></div>
							<div class="col col-md-11">
								<div class="form-check">
									@foreach ($hours as $hour)
                                        <div class="checkbox">
                                        	@if ($hour->is_available === true)
                                            <label for="checkbox{{$hour->hour}}" class="form-check-label ">
                                                <input type="checkbox" id="checkbox{{$hour->hour}}" name="times[]" value="{{$hour->hour}}" class="form-check-input" onclick="onClick()"> {{ $hour->hour . ':00' }}
                                            </label>
                                            @else
                                            	{{ $hour->hour . ':00' }}
                                            @endif
                                        </div>
                                    @endforeach
								</div>
	                        </div>
						</div>

						<br />
						<h3>Total Harga : <label id="total">Rp. 0</label></h3>
						<br />

						<input type="submit" class="btn btn-primary" value="Booking" />
					</form>

            	</div>
        	</div>
    	</div>
	</div>

@endsection

@section('script')

	<script type="text/javascript" defer>
		function onClick() {
			var n = jQuery("input:checked").length;
			jQuery("#total").html('Rp. ' + n * 50000);
		}
	</script>

@endsection