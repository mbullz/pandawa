@extends('layouts.app')

@section('page_title')
	Payment Confirmation
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Payments</a></li>
	<li class="active">Confirmation</li>
@endsection

@section('content')

	{{-- URL::asset('storage') --}}

	<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Form</strong>
                </div>
                <div class="card-body">
					
					<form action="/payments" method="POST" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}
						<input type="hidden" name="booking_id" value="{{ $booking_id }}" />
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="date" class=" form-control-label">Tanggal</label></div>
				            <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="" class="form-control"><small class="form-text text-muted">Tanggal transfer</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="amount" class=" form-control-label">Jumlah</label></div>
				            <div class="col-12 col-md-9"><input type="number" id="amount" name="amount" placeholder="" class="form-control"><small class="form-text text-muted">Jumlah yang di bayarkan</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="branch" class=" form-control-label">Bank</label></div>
				            <div class="col-12 col-md-9"><input type="text" id="branch" name="branch" placeholder="" class="form-control"><small class="form-text text-muted">Bank yang di gunakan untuk pembayaran</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="account_name" class=" form-control-label">Nama Rekening</label></div>
				            <div class="col-12 col-md-9"><input type="text" id="account_name" name="account_name" placeholder="" class="form-control"><small class="form-text text-muted">Nama rekening yang di gunakan untuk pembayaran</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="account_number" class=" form-control-label">Nomor Rekening</label></div>
				            <div class="col-12 col-md-9"><input type="number" id="account_number" name="account_number" placeholder="" class="form-control"><small class="form-text text-muted">Nomor rekening yang di gunakan untuk pembayaran</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="receipt" class=" form-control-label">Bukti Pembayaran</label></div>
				            <div class="col-12 col-md-9"><input type="file" id="receipt" name="receipt" placeholder="" class="form-control"><small class="form-text text-muted">Upload bukti pembayaran</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="handphone" class=" form-control-label">WhatsApp</label></div>
				            <div class="col-12 col-md-9"><input type="number" id="handphone" name="handphone" placeholder="" class="form-control"><small class="form-text text-muted">Nomor whatsapp yang dapat di hubungi</small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3"><label for="notes" class=" form-control-label">Keterangan</label></div>
				            <div class="col-12 col-md-9"><textarea id="notes" name="notes" class="form-control" rows="5"></textarea><small class="form-text text-muted"></small></div>
				        </div>
				        <div class="row form-group">
				            <div class="col col-md-3">&nbsp;</div>
				            <div class="col-12 col-md-9"><input type="submit" value="Confirm" class="btn btn-primary" /></div>
				        </div>
				    </form>

            	</div>
        	</div>
    	</div>
	</div>

@endsection