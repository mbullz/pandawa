@extends('layouts.app')

@section('page_title')
	Schedules Sorted
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Schedules</a></li>
	<li class="active">Sorted</li>
@endsection

@section('content')

	<div class="row">
		@foreach ($dates_for_human as $row)
		        <div class="col-lg-6">
		            <div class="card">
		                <div class="card-header">
		                    <strong class="card-title">{{ $row }}</strong>
		                </div>
		                <div class="card-body">
		                	
		                	<table class="table">
                                <tbody>
                                	@foreach ($schedules->get($loop->index) as $schedule)
                                		<tr>
	                                        <th scope="row">{{ $schedule->hour }}:00</th>
	                                        <td>
	                                        	{{ $schedule->name }}
	                                        </td>
	                                        <td>Otto</td>
	                                        <td>@mdo</td>
	                                    </tr>
                                	@endforeach
                                </tbody>
                            </table>

		            	</div>
		        	</div>
		    	</div>
		@endforeach
	</div>
	
	Booking Index Admin Sorted

	<br />

	{{ $schedules }}

@endsection