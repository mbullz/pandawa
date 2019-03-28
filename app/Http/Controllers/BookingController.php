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
    public function index($is_sorted = false)
    {
        $now = Carbon::now('+7');
        $dates = collect([]);
        $dates_for_human = collect([]);
        $dates->push($now->copy()->toDateString());
        $dates_for_human->push($now->copy()->format('l, j-n-Y'));
        for ($i = 1; $i <= 6; $i++) {
            $dates->push($now->copy()->addDays($i)->toDateString());
            $dates_for_human->push($now->copy()->addDays($i)->format('l, j-n-Y'));
        }

        $bookings = DB::table('bookings')
                        ->join('users', 'bookings.user_id', '=', 'users.user_id')
                        ->whereIn('date', $dates)
                        ->orderBy('date', 'asc')
                        ->orderBy('start_time', 'asc')
                        ->get();

        $schedules = collect([]);
        for ($i = 0; $i < 7; $i++) {

            $rows = collect([]);
            $booking = $bookings->where('date', $dates->get($i));
            $end_time = null;
            for ($j = 16; $j < 24; $j++) {
                $hour = substr('0' . $j, -2);

                if ($end_time == null) {
                    $booking_id = 0;
                    $status = 0;
                    $name = '';

                    $r = $booking->where('start_time', $hour . ':00:00')->first();
                    if ($r != null) {
                        $booking_id = $r->booking_id;
                        $status = $r->status;
                        $name = $r->name;
                        $end_time = $r->start_time == $r->end_time ? null : $r->end_time;
                    }
                }
                else {
                    if (substr($end_time, 0, 2) == $hour) $end_time = null;
                }

                $row = (object)[
                    'booking_id'    => $booking_id,
                    'hour'          => $hour,
                    'status'        => $status,
                    'name'          => $name,
                ];

                $rows->push($row);
            }

            $schedules->push($rows);
        }

        return view('bookings.index_admin_sorted', [
            'dates'             => $dates,
            'dates_for_human'   => $dates_for_human,
            'schedules'         => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $date = null) {
        $now = Carbon::now('+7');
        $dates = collect([]);
        $dates->push($now->copy()->toDateString());
        for ($i = 1; $i <= 6; $i++) {
            $dates->push($now->copy()->addDays($i)->toDateString());
        }

        $date = $request->date ?? $now->copy()->toDateString();

        $bookings = DB::table('bookings')
                        ->where('user_id', 1)
                        ->where('date', $date)
                        ->orderBy('start_time', 'asc')
                        ->get();

        $bookedHours = $bookings->pluck('start_time');

        $hours = collect([]);

        for ($i = 0; $i < 24; $i++) {
            $hour = substr('0' . $i, -2);
            $is_available = true;

            if ($bookedHours->count() > 0 && $bookedHours->search($hour . ':00:00') !== false) {
                $is_available = false;
            }

            $row = (object)[
                'hour'          => $hour,
                'is_available'  => $is_available,
            ];
            $hours->push($row);
        }

        return view('bookings.create', [
            'date'      => $date,
            'dates'     => $dates,
            'hours'     => $hours,
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
        $user_id = 1;
        $date = $request->date;
        $times = collect($request->times)->sort();

        if ($date == null || $times->count() <= 0) return redirect()->route('bookings.create');

        $start_time = $times->get(0) + 0;
        $end_time = $times->get($times->count()-1) + 0;

        if ($end_time - $start_time != $times->count() - 1) return redirect()->route('bookings.create');

        $booking_id = DB::table('bookings')
                        ->insertGetId([
                            'user_id'       => $user_id,
                            'date'          => $date,
                            'start_time'    => $times->get(0) . ':00:00',
                            'end_time'      => $times->get($times->count()-1) . ':00:00',
                            'status'        => 1,
                        ]);

        return redirect()->action('BookingController@show', [
            'id'    => $booking_id,
        ]);
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
                        ->join('users', 'bookings.user_id', '=', 'users.user_id')
                        ->where('booking_id', $id)
                        ->first();

        $start_time = substr($booking->start_time, 0, 2) + 0;
        $end_time = substr($booking->end_time, 0, 2) + 0;

        $total = ($end_time - $start_time + 1) * 50000;

        $date = new Carbon($booking->date, '+7');
        $date = $date->format('l, j-n-Y');

        return view('bookings.show', [
            'booking'   => $booking,
            'total'     => number_format($total, 2, ',', '.'),
            'date'      => $date,
        ]);
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
