<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use App\About;
use App\Project;
use App\Event;
use App\Quotation;
use App\Partner;
use Illuminate\Http\Request;
use Symfony\Component\EventDispatcher\Event as SymfonyEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $products = Product::all();
        $abouts = About::all();
        $projects = Project::all();
        $events = Event::all();
        $partners = Partner::all();
        return view('welcome',compact('sliders','categories','products','abouts','projects','events','partners'));
    }

}