<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Project;
use App\Quotation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class dashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        $projectCount = Project::count();
        $sliderCount = Slider::count();
        $quotations = Quotation::where('status',false)->get();
        $contactCount = Contact::count();
        return view('admin.dashboard',compact('categoryCount','projectCount','sliderCount','quotations','contactCount','productCount'));
    }
}
