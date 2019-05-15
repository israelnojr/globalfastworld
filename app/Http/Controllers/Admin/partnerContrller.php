<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Partner;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class partnerContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/partner'))
            {
                mkdir('uploads/partner', 0777 , true);
            }
            $image->move('uploads/partner',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->description= $request->description;
        $partner->image = $imagename;
        $partner->save();
        return redirect()->route('partner.index')->with('success', 'Partner Succesfffully Added');
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
        $partner = Partner::find($id);
        return view('admin.partner.edit',compact('partner'));
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $partner = Partner::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/partner'))
            {
                mkdir('uploads/partner',0777,true);
            }
            unlink('uploads/partner/'.$partner->image);
            $image->move('uploads/partner',$imagename);
        }else{
            $imagename = $partner->image;
        }
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->image = $imagename;
        $partner->save();
        return redirect()->route('partner.index')->with('success','Partner Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        if (file_exists('uploads/partner/'.$partner->image))
        {
            unlink('uploads/partner/'.$partner->image);
        }
        $partner->delete();
        return redirect()->back()->with('success','Partner Successfully Deleted');
    }
}
