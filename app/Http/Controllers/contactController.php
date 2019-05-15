<?php

namespace App\Http\Controllers;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->fullname = $request->fullname;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Toastr::Success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('success', 'Message Succesfffully Sent');
    }
}
