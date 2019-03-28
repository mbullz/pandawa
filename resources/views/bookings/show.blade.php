@extends('layouts.app')

@section('page_title')
	Booking Detail
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Bookings</a></li>
	<li class="active">Detail</li>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-3">
			&nbsp;
		</div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-sm-center">
                    <strong class="card-title mb-3">Detail Transaksi</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        
                        <h5 class="text-sm-center mt-2 mb-2">Nama Band : <strong>{{ $booking->name }}</strong></h5>
                        <h5 class="text-sm-center mt-2 mb-2">Hari/Tanggal : <strong>{{ $date }}</strong></h5>
                        <h5 class="text-sm-center mt-2 mb-2">
                        	Pukul : 
                        	<strong>
                        		{{ substr($booking->start_time, 0, 2) }}:00 - {{ substr($booking->end_time, 0, 2) }}:59
                        	</strong>
                        </h5>
                        <br />
                        <h5 class="text-sm-center mt-2 mb-2">Total Pembayaran : <strong>Rp. {{ $total }}</strong></h5>
                        <!--
                        <h5 class="text-sm-center mt-2 mb-2" style="font-style: italic;">
                        	#Booking Code : <strong>{{ $booking->booking_id }}</strong>
                        </h5>
                    	-->
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                    	<a href="/payments/{{ $booking->booking_id }}" class="btn btn-primary">Payment</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
			&nbsp;
		</div>
    </div>

    <br /><br />

@endsection