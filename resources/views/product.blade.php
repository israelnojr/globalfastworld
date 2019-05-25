@extends('layouts.frontend.app')
@section('content')
<section id="menu-list" class="menu-list">
        <div id="w">
            <div class="pricing-filter marginBottom">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="section-header">
                                    <h2 class="pricing-title">{{ $product->name }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="contentSection">
                            <img class="img-responsive thumbnail" src="{{ asset('uploads/product/'.$product->image) }}" alt="{{ $product->name }}" >
                            <hr>
                            <div class="textSection">
                                <p>{{$product->description}}</p>
                            </div>
                            <a  class="btn button specBtn" href="{{$product->document}}"target="_blank" >View Specification</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection