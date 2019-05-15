@extends('layouts.app')

@section('title','quotation')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">{{$quotation->product->name}}</h4>
                        </div>
                        <div class="card-content">
                           <div class="row">
                               <div class="col-md-12">
                                   <strong>Name: {{ $quotation->fullname }}</strong><br>
                                   <b>Email: {{ $quotation->email }}</b> <br>
                                   <b>Phone: {{ $quotation->phone }}</b> <br>
                                   <b>Address: {{ $quotation->address }}</b> <br>
                                   <b>Country: {{ $quotation->country }}</b> <br>
                                   <strong>Message: </strong><hr>

                                   <p>{{ $quotation->message }}</p><hr>

                               </div>
                           </div>
                            <a href="{{ route('quotation.index') }}" class="btn btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush