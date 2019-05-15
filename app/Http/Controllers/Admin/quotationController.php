<?php

namespace App\Http\Controllers\Admin;

use App\Quotation;
use App\Product;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class quotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::all();
        return view('admin.quotation.index',compact('quotations'));
    }
    public function status($id){
        $quotation = Quotation::find($id);
        $quotation->status = true;
        $quotation->save();
        return redirect()->route('quotation.index')->with('success', 'Quotation Succesfffully Comfirmed');
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
        $quotation = Quotation::find($id);
        return view('admin.quotation.show',compact('quotation'));
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
    public function destory($id){
        Quotation::find($id)->delete();
        return redirect()->route('quotation.index')->with('success', 'Quotation Succesfffully Deleted');
    }
}
