<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(Request $request) {
        if (!$request->session()->exists('role')) return redirect('/login');

        $now = Carbon::now('+7')->toDateString();

        $bookings = DB::table('bookings')
                        ->join('users', 'bookings.user_id', '=', 'users.user_id')
                        ->where('date', '>=', $now)
                        ->where('status', 1)
                        ->orderBy('booking_id', 'desc')
                        ->get();

        $payments = DB::table('payments')
                        ->join('bookings', 'payments.booking_id', '=', 'bookings.booking_id')
                        ->join('users', 'bookings.user_id', '=', 'users.user_id')
                        ->where('bookings.date', '>=', $now)
                        ->where('status', 2)
                        ->select('*', 'payments.date AS payment_date', 'bookings.date AS booking_date')
                        ->orderBy('payment_id', 'desc')
                        ->get();

        return view('home', [
            'role'              => $request->session()->get('role', ''),
            'name'              => $request->session()->get('name', ''),
            'payments'          => $payments,
            'count_payments'    => $payments->count(),
            'bookings'          => $bookings,
            'count_bookings'    => $bookings->count(),
        ]);
    }

    public function contactus() {
        return view('contactus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
