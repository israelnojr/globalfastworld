<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/category'))
            {
                mkdir('uploads/category', 0777 , true);
            }
            $image->move('uploads/category',$imagename);
        }else {
            $imagename = 'default.png';
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $imagename;
        $category->save();
        return redirect()->route('category.index')->with('success','Category Successfully Saved');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
            'name'=>'required'
        ]);
        $category = Category::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/category'))
            {
                mkdir('uploads/category',0777,true);
            }
            unlink('uploads/category/'.$category->image);
            $image->move('uploads/category',$imagename);
        }else{
            $imagename = $category->image;
        }
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $imagename;
        $category->save();
        return redirect()->route('category.index')->with('success','Category Successfully Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        if (file_exists('uploads/category/'.$category->image))
        {
            unlink('uploads/category/'.$category->image);
        }
        return redirect()->back()->with('success','Category Successfully Delete');
    }
}
