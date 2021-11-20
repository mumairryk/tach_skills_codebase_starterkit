<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Transport::all();
        return view('transport.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transport.crud');
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
            'assignment'=>'required',
            'date'=>'required',
        ]);
        $md = Transport::create($request->all());
        return redirect()->route("transports.index")->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit( $transport)
    {
        $row = Transport::findOrFail($transport);
        return view("transport.crud",compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $transport)
    {
        $this->validate($request,[
            'priority'=>'required',
            'date'=>'required',
            'assignment'=>'required',
        ]);
        $md = Transport::findOrFail($transport);
        $md->update($request->all());
       return redirect()->route("transports.index")->with('success','Data Saved');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy( $transport)
    {
        $md = Transport::findOrFail($transport);
        $md->delete();
        return redirect()->route("transports.index")->with('success','Data Deleted');
    }
}
