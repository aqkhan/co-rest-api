<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hall;
use App\Stand;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $halls = Hall::all();
        return $halls;
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
        Hall::create($request->all());
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
        $hall = Hall::findOrFail($id);
        $stands = $hall->stands;
        foreach ($stands as $stand) {
            if (!empty($stand->booking_id)) {
                $st = Stand::findOrFail($stand->booking_id)->booking->id;
                $bookingInfo = Booking::findOrFail($st)->user;
                $stand['booking_info'] = $bookingInfo;
            }
        }
        $hallData = [
            'hall_id' => $hall->id,
            'hall_name' => $hall->name,
            'hall_stand' => $stands
        ];
        return $hallData;
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
        Hall::findOrFail($id)->update($request->all());
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
        Hall::findOrFail($id)->delete();
    }
}
