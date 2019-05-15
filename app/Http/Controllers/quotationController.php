<?php

namespace App\Http\Controllers;
use App\Quotation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class quotationController extends Controller
{
    public function send(Request $request){
        $this->validate($request,[
            'product' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'country' => 'required',
            'message' => 'required',
        ]);
        $quotation = new Quotation();
        $quotation->product_id = $request->product;
        $quotation->fullname = $request->fullname;
        $quotation->phone = $request->phone;
        $quotation->email = $request->email;
        $quotation->address = $request->address;
        $quotation->country = $request->country;
        $quotation->message = $request->message;
        $quotation->status = false;
        $quotation->save();
        Toastr::success('Quotation request sent successfully. we will confirm to you shortly',
                'Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('success','Quotation request sent successfully. we will confirm to you shortly');
    }
}
