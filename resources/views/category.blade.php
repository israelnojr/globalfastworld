@extends('layouts.frontend.app')

@section('content')
<section id="menu-list" class="menu-list">
        <div id="w">
            <div class="pricing-filter">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="section-header">
                                    <h2 class="pricing-title">products  catgories</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <ul id="menu-pricing" class="menu-price">
                            @foreach($categories as $category)
                                <li class="item" id="{{ $category->slug }}">
                                    <a href="{{route('category.product', $category->slug)}}">
                                        <img src="{{ asset('uploads/category/'.$category->image) }}" class="img-responsive" alt="Product" style="height: 300px; width: 300px;" >
                                    </a>
                                    <h2 class="white">{{ $category->name }}</h2>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection