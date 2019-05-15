<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\About;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index')->with('abouts',$abouts); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/about'))
            {
                mkdir('uploads/about', 0777 , true);
            }
            $image->move('uploads/about',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $about = new About();
        $about->title = $request->title;
        $about->body = $request->body;
        $about->image = $imagename;
        $about->save();
        return redirect()->route('about.index')->with('success', 'About Succesfffully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::find($id);
        return view('admin.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $about = About::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/about'))
            {
                mkdir('uploads/about', 0777 , true);
            }
            $image->move('uploads/about',$imagename);
        }else {
            $imagename = $about->image;
        }

        $about->title = $request->title;
        $about->body = $request->body;
        $about->image = $imagename;
        $about->save();
        return redirect()->route('about.index')->with('success','About Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        if (file_exists('uploads/about/'.$about->image))
        {
            unlink('uploads/about/'.$about->image);
        }
        $about->delete();
        return redirect()->back()->with('success','About Successfully Deleted');
    }
}
