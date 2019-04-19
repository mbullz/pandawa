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
	                                        	<div class="row">
		                                        	@foreach ($schedule->childs as $child)
		                                        		<div class="col-lg-6 text-center">
		                                        			{{ $child->name }}
		                                        		</div>

		                                        		<div class="col-lg-6 text-center">
			                                        		@if ($child->status == 4)
				                                        		<span class="badge badge-danger">Cancelled</span>
				                                        	@elseif ($child->status == 3)
				                                        		<span class="badge badge-success">Completed</span>
				                                        	@elseif ($child->status == 2)
				                                        		<span class="badge badge-primary">Processing</span>
				                                        	@elseif ($child->status == 1)
				                                        		<span class="badge badge-secondary">Order</span>
				                                        	@endif
			                                        	</div>
		                                        	@endforeach
	                                        	</div>
	                                        </td>
	                                    </tr>
                                	@endforeach
                                </tbody>
                            </table>

		            	</div>
		        	</div>
		    	</div>
		@endforeach
	</div>

@endsection