<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking_id = $request->booking_id ?? 0;
        $date = $request->date ?? '';
        $amount = $request->amount ?? 0;
        $branch = $request->branch ?? '';
        $account_name = $request->account_name ?? '';
        $account_number = $request->account_number ?? '';
        $notes = $request->notes ?? '';

        if ($date == '' || $amount <= 0 || $branch == '' || $account_name == '' || $account_number == '')
            return redirect()->route('payments.create');

        $booking = DB::table('bookings')
                        ->where('booking_id', $booking_id)
                        ->first();

        if ($booking == null) return redirect()->route('payments.create');

        $path = null;
        if ($request->hasFile('receipt')) {
            $path = $request->file('receipt')->store('uploads');
        }

        $payment_id = DB::table('payments')
                        ->insertGetId([
                            'booking_id'        => $booking_id,
                            'date'              => $date,
                            'amount'            => $amount,
                            'branch'            => $branch,
                            'account_name'      => $account_name,
                            'account_number'    => $account_number,
                            'notes'             => $notes,
                            'receipt'           => $path,
                        ]);

        DB::table('bookings')
            ->where('booking_id', $booking_id)
            ->update([
                'status'    => 2,
            ]);

        return redirect('/');
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
