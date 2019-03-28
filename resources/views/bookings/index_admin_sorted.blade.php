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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
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