<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Appointment::all();
        return view('appointment.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'priority'=>'required',
            'date'=>'required',
            'assignment'=>'required',
        ]);
        $md = Appointment::create($request->all());
        return redirect()->route("appointments.index")->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show( $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit( $appointment)
    {
        $row = Appointment::findOrFail($appointment);
        return view("appointment.crud",compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $appointment)
    {
        $this->validate($request,[
            'priority'=>'required',
            'date'=>'required',
            'assignment'=>'required',
        ]);
        $md = Appointment::findOrFail($appointment);
        $md->update($request->all());
        return redirect()->route("appointments.index")->with('success','Data Saved');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $appointment)
    {
        $md = Appointment::findOrFail($appointment);
        $md->delete();
        return redirect()->route("appointments.index")->with('success','Data Deleted');
    }

    public function calendar(){
        return view('appointment.calendar');
    }
}
