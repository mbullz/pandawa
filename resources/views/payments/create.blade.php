@extends('layouts.app')

@section('content')

	{{ URL::asset('storage') }}

	<form method="POST" action="/payments" enctype="multipart/form-data">
		{{ csrf_field() }}
		Booking Code : <input type="number" name="booking_id" />
		<br />
		Date : <input type="date" name="date" />
		<br />
		Amount : <input type="number" name="amount" />
		<br />
		Branch : <input type="text" name="branch" />
		<br />
		Account Name : <input type="text" name="account_name" />
		<br />
		Account Number : <input type="text" name="account_number" />
		<br />
		Upload Receipt : <input type="file" name="receipt">
		<br />
		Notes : <textarea name="notes"></textarea>
		<br />
		<input type="submit" value="Confirm" />
	</form>

	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">Username</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Text Input</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                                    </div>

@endsection