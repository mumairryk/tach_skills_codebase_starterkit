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
        $data_set = Appointment::selectRaw('id,priority,assignment as title,comment,date as start')->get();
        $data=array();
        foreach ($data_set as $item)
        {
            if ($item->priority==1)
            {
                $color="#9ccc65";
            }
            elseif ($item->priority==2)
            {
                $color="#f7e8b8";
            }
            elseif ($item->priority==3)
            {
                $color="#b5e2f7";
            }
            else
            {
                $color="#ef5350";
            }
            $data[]=array('id'=>$item->id,'priority'=>$item->priority,'title'=>$item->title,'comment'=>$item->comment,'date'=>$item->start,'color'=>$color);
        }
        return view('appointment.calendar',compact('data'));
    }
    public function ajaxSubmit(Request $request)
    {

        if ($request->has('id') && $request->id!='')
        {
            $md = Appointment::findOrFail($request->id);
            $md->update($request->all());
            return redirect()->back()->with('success','Data Updated');

        }
        else
        {
            $md = Appointment::create($request->except('id'));
            return redirect()->back()->with('success','Data Saved');
        }
    }
}
