@extends('layouts.app')

@section('title','Dashboard')

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Cat / Prod</p>
                            <h3 class="title">{{ $categoryCount }}/{{ $productCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">info</i>
                                <a href="#pablo">Total Categories and Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">slideshow</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Slider Count</p>
                            <h3 class="title">{{ $sliderCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> <a href="{{ route('slider.index') }}">Get More Details...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">local_printshop</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Quotation</p>
                            <h3 class="title">{{ $quotations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Not Confirmed Quotation
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">message</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Message</p>
                            <h3 class="title">{{ $contactCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Quotations</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>DateTime</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($quotations as $key=>$quotation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $quotation->fullname }}</td>
                                        <td>{{ $quotation->phone }}</td>
                                        <td>{{ $quotation->address }}</td>
                                        <td>{{ $quotation->country }}</td>
                                        <th>
                                            @if($quotation->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>{{ $quotation->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            @if($quotation->status == false)
                                                <form id="status-form-{{ $quotation->id }}" action="{{ route('quotation.status',$quotation->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                                <a href="{{ route('quotation.show',$quotation->id) }}" class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i></a>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-{{ $quotation->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">done</i>
                                                </button>
                                            @endif
                                            <form id="delete-form-{{ $quotation->id }}" action="{{ route('quotation.destory',$quotation->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $quotation->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"><i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush