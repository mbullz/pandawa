@extends('layouts.app')

@section('content')
	
	<h1>Booking Detail</h1>

	Date : {{ $booking->date }}
	<br />
	Time : {{ $booking->time }}

	<br /><br />

	<a href="/payments">Payment</a>

@endsection