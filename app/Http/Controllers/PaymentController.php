<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $booking_id = $request->booking_id ?? 0;

        if ($booking_id == 0) return redirect('/bookings');

        return view('payments.create', [
            'booking_id'    => $booking_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->session()->get('user_id', 0);
        $booking_id = $request->booking_id ?? 0;
        $date = $request->date ?? '';
        $amount = $request->amount ?? 0;
        $branch = $request->branch ?? '';
        $account_name = $request->account_name ?? '';
        $account_number = $request->account_number ?? '';
        $handphone = $request->handphone ?? '';
        $notes = $request->notes ?? '';

        if ($booking_id == 0 || $date == '' || $amount <= 0 || $branch == '' || $account_name == '' || $account_number == '' || $handphone == '')
            return redirect('/bookings');

        $booking = DB::table('bookings')
                        ->where('booking_id', $booking_id)
                        ->first();

        if ($booking == null) return redirect('/bookings');

        $r = DB::table('bookings')
                    ->where('date', $booking->date)
                    ->where('start_time', '<=', $booking->start_time)
                    ->where('end_time', '>=', $booking->start_time)
                    ->where('studio', '!=', 0)
                    ->get();

        // studio full
        if ($r->count() >= 3) {
            DB::table('bookings')
            ->where('booking_id', $booking_id)
            ->update([
                'status'        => 4,
                'updated_by'    => $user_id,
                'updated_at'    => DB::raw('NOW()'),
            ]);

            return redirect('/bookings');
        }

        $studio = $r->count() + 1;

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
                            'handphone'         => $handphone,
                            'notes'             => $notes,
                            'receipt'           => $path,
                        ]);

        DB::table('bookings')
            ->where('booking_id', $booking_id)
            ->update([
                'studio'        => $studio,
                'status'        => 2,
                'updated_by'    => $user_id,
                'updated_at'    => DB::raw('NOW()'),
            ]);

        return redirect('/bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = DB::table('bookings')
                        ->where('booking_id', $id)
                        ->first();

        $start_time = substr($booking->start_time, 0, 2) + 0;
        $end_time = substr($booking->end_time, 0, 2) + 0;

        $total = ($end_time - $start_time + 1) * 50000;

        return view('payments.show', [
            'booking_id'    => $id,
            'total'         => number_format($total, 2, ',', '.'),
        ]);
    }

    public function confirm(Request $request, $id) {
        if ($id == null) return redirect('/');

        $payment = DB::table('payments')
                        ->where('payment_id', $id)
                        ->first();

        DB::table('bookings')
            ->where('booking_id', $payment->booking_id)
            ->update([
                'status'    => 3,
            ]);

        return redirect('/');
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
