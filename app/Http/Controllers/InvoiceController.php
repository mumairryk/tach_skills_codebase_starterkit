<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type)
    {
        $list = Invoice::where('type',$request->type)->get();
        return view('invoice.list',compact('list','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view("invoice.crud",compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type)
    {
        $this->validate($request, [
            'priority' => 'required',
        ]);
        $md = Invoice::create($request->all());
        return redirect()->route('invoice.index',$request->type)->with('success','Data Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit( $invoice)
    {
        $row = Invoice::findOrFail($invoice);
        $type = $row->type;
        return view('invoice.crud',compact('row','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $invoice)
    {
        $md = Invoice::findOrFail($invoice);
        $md->update($request->all());
        return redirect()->route('invoice.index',$md->type)->with('success','Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy( $invoice)
    {
        $md = Invoice::findOrFail($invoice);
        $type = $md->type;
        $md->destroy();
        return redirect()->route('invoice.index',$type)->with('success','Data deleted');
    }
}
