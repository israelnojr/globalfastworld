<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
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
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'document' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/product'))
            {
                mkdir('uploads/product',0777,true);
            }
            $image->move('uploads/product',$imagename);
        }else{
            $imagename = "default.png";
        }
        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->slug = str_slug($request->name);
        $product->document = $request->document;
        $product->image = $imagename;
        $product->save();
        return redirect()->route('product.index')->with('success','Product Successfully Saved');
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
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
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
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'document'  => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $product = Product::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/product'))
            {
                mkdir('uploads/product',0777,true);
            }
            unlink('uploads/product/'.$product->image);
            $image->move('uploads/product',$imagename);
        }else{
            $imagename = $product->image;
        }

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->slug = str_slug($request->name);
        $product->document = $request->document;
        $product->image = $imagename;
        $product->save();
        return redirect()->route('product.index')->with('success','Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists('uploads/product/'.$product->image))
        {
            unlink('uploads/product/'.$product->image);
        }
        $product->delete();
        return redirect()->back()->with('success','Product successfully Deleted');
    }
}
