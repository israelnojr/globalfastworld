@extends('layouts.frontend.app')
<style>
    .pricing-filter1 {
        background: url({{ asset('uploads/category/'.$category->image) }});
        height: 40vh;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        position: relative;
        top: 92px;
        margin-bottom: 70px;
    }
</style>
@section('content')
<section id="menu-list" class="menu-list">
        <div id="w">
            <div class="pricing-filter1">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-header">
                                    <h2 class="pricing-title">{{ $category->name }}</h2>
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
                            @foreach($products as $product)
                                <li class="item" id="{{ $product->category->slug }}">
                                    <a href="{{route('product', $product->slug)}}">
                                        <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-responsive" alt="Product" style="height: 300px; width: 300px;" >
                                    </a>
                                    <h2 class="white">{{ $product->name }}</h2>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection