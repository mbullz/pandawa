@extends('layouts.app')

@section('page_title')
	Dashboard
@endsection

@section('breadcrumb')
	<li class="active">Dashboard</li>
@endsection

@section('content')

    @if ($role == 'user')

        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-sm-center">
                        <strong class="card-title mb-3">Pandawa Music Studio</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <h5 class="text-sm-center mt-2 mb-2">Welcome, <strong>{{ $name }}</strong>!!!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                &nbsp;
            </div>
        </div>

        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

    @elseif ($role == 'admin')

	<div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{ $count_bookings }}</span></div>
                                <div class="stat-heading">Bookings</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{ $count_payments }}</span></div>
                                <div class="stat-heading">Payments</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">New Payments</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Booking</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Account</th>
                                <th scope="col">Receipt</th>
                                <th scope="col">Notes</th>
                                <th scope="col"></th>
                                </tr>
                          </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <small>
                                            {{ $payment->name }}
                                            <br />
                                            {{ $payment->booking_date }}
                                            <br />
                                            {{ substr($payment->start_time, 0, 5) }} - {{ substr($payment->end_time, 0, 2) }}:59
                                            </small>
                                        </td>
                                        <td>{{ number_format($payment->amount, 0, ',', '.') }}</td>
                                        <td>
                                            <small>
                                                {{ $payment->branch }}
                                                <br />
                                                {{ $payment->account_number }}
                                                <br />
                                                {{ $payment->account_name }}
                                            </small>
                                        </td>
                                        <td>
                                            <a href="{{ URL()->asset('storage') . '/' . $payment->receipt }}" target="_blank">
                                                <img src="{{ URL()->asset('storage') . '/' . $payment->receipt }}" width="50px" />
                                            </a>
                                        </td>
                                        <td>
                                            WA : {{ $payment->handphone }}
                                            <br />
                                            {{ $payment->notes }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-success" onclick="window.location='payments/confirm/{{ $payment->payment_id }}';">Confirm</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
            	</div>
        	</div>

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">New Bookings</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Band Name</th>
                                <th scope="col">Status</th>
                                </tr>
                          </thead>
                            <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ substr($booking->start_time,0,5) }} - {{ substr($booking->end_time,0,2) }}:59</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>
                                        @if ($booking->status == 3)
                                            <span class="badge badge-success">Completed</span>
                                        @elseif ($booking->status == 2)
                                            <span class="badge badge-primary">Processing</span>
                                        @elseif ($booking->status == 1)
                                            <span class="badge badge-secondary">Order</span>
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

    @endif

@endsection