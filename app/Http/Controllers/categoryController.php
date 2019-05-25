<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Slider;
use App\About;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $abouts = About::all();
        $categories = Category::all();
        $products = Product::all();
        return view('category',compact('sliders','abouts','categories','products'));
    }

    public function singleproduct($slug)
    {
        $sliders = Slider::all();
        $abouts = About::all();
        $product = Product::where('slug',$slug)->first();
        return view('product', compact('sliders','abouts','product'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sliders = Slider::all();
        $abouts = About::all();
        $category = Category::where('slug',$slug)->first();
        $products = $category->products;
        return view('products',compact('sliders','abouts','category','products'));
    }
   
}
