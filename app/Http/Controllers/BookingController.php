<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $now = Carbon::now('+7')->toDateString();

        $bookings = DB::table('bookings')
                        ->where('user_id', 1)
                        ->where('date', $now)
                        ->get();

        $hours = collect([]);

        for ($i = 0; $i < 24; $i++) {
            $hour = substr('0' . $i, -2);
            $row = (object)[
                'hour'          => $hour,
                'is_available'  => true,
            ];
            $hours->push($row);
        }

        return view('bookings.create', [
            'now'       => $now,
            'bookings'  => $bookings,
            'hours'     => $hours,
        ]);
    }

    public function booking_confirmation() {

    }

    public function payment() {

    }

    public function payment_confirmation() {
        
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
