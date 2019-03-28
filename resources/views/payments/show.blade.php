@extends('layouts.app')

@section('page_title')
	Payment Information
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Payments</a></li>
	<li class="active">Information</li>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-3">
			&nbsp;
		</div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-sm-center">
                    <strong class="card-title mb-3">Informasi Rekening</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        
                        <h5 class="text-sm-center mt-2 mb-2">Transfer pembayaran ke nomor rekening :</h5>
                        <br />
                        <h5 class="text-sm-center mt-2 mb-2">888 912 1709</h5>
                        <h5 class="text-sm-center mt-2 mb-2">Muchlis Nur Cahyanto</h5>
                        <br />
                        <center><img src="{{ url()->asset('images/bca.png') }}" width="75%" /></center>
                        <br />
                        <h5 class="text-sm-center mt-2 mb-2"><small>Jumlah yang harus dibayar</small><br /><br />Rp. {{ $total }}</h5>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                    	<a href="/payments/create?booking_id={{ $booking_id }}" class="btn btn-primary">Payment Confirmation</a>
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