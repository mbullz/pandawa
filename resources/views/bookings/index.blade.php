@extends('layouts.app')

@section('page_title')
	Bookings
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Bookings</a></li>
	<li class="active">Index</li>
@endsection

@section('content')
	
	<div class="row">
        <div class="col-lg-12">
        	<button class="btn btn-primary" onclick="window.location='/bookings/create';">New Booking</button>
        	@if ($role == 'admin')
        		<button class="btn btn-info" onclick="window.location='/bookings/sorted';">Sort Schedules</button>
        	@endif
        	<br /><br />

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">List of Booking</strong>
                </div>
                <div class="card-body">
                	
                	<table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Band</th>
                                <th>Studio</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@foreach ($bookings as $booking)
                        		<tr>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ substr($booking->start_time,0,5) }} - {{ substr($booking->end_time,0,2) }}:59</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>
                                        @if ($booking->studio == 0)
                                            -
                                        @else
                                            {{ $booking->studio }}
                                        @endif
                                    </td>
                                    <td>
                                    	@if ($role == 'admin')
                                    		@if ($booking->status == 4)
	                                    		<span class="badge badge-danger">Cancelled</span>
                                            @elseif ($booking->status == 3)
                                                <span class="badge badge-secondary">Completed</span>
	                                    	@elseif ($booking->status == 2)
	                                    		<button class="btn btn-success" onclick="window.location='/';">Confirm</button>
	                                    	@elseif ($booking->status == 1)
	                                    		<button class="btn btn-warning" onclick="window.location='/bookings/{{ $booking->booking_id }}';">Make Payment</button>
	                                    	@endif
                                    	@elseif ($role == 'user')
                                    		@if ($booking->status == 4)
	                                    		<span class="badge badge-danger">Cancelled</span>
                                            @elseif ($booking->status == 3)
                                                <span class="badge badge-success">Completed</span>
	                                    	@elseif ($booking->status == 2)
	                                    		<span class="badge badge-secondary">Processing</span>
	                                    	@elseif ($booking->status == 1)
	                                    		<button class="btn btn-warning" onclick="window.location='/bookings/{{ $booking->booking_id }}';">Make Payment</button>
	                                    	@endif
                                    	@endif
                                    </td>
                                </tr>
                        	@endforeach
                        </tbody>
                    </table>

            	</div>
        	</div>
    	</div>
	</div>

    <br /><br /><br /><br /><br /><br /><br /><br />

@endsection