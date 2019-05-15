@extends('layouts.app')

@section('title','Quotation')

@push('css')
    
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Quotations</h4>
                        </div>
                        <div class="card-content table-responsive table-custom">
                            <table id="table" class="table"  cellspacing="0" width="100%" height="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Product Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>DateTime</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($quotations as $key=>$quotation)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $quotation->fullname }}</td>
                                            <td>{{$quotation->product->name}} </td>
                                            <td>{{ $quotation->phone }}</td>
                                            <td>{{ $quotation->email }}</td>
                                            <th>
                                                @if($quotation->status == true)
                                                    <span class="label label-info">Confirmed</span>
                                                @else
                                                    <span class="label label-danger">not Confirmed yet</span>
                                                @endif

                                            </th>
                                            <td>{{ $quotation->created_at->toformattedDateString() }}</td>
                                            <td>
                                                @if($quotation->status == false)
                                                    <form id="status-form-{{ $quotation->id }}" action="{{ route('quotation.status',$quotation->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                    </form>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Have you verify this request by phone?')){
                                                            event.preventDefault();
                                                            document.getElementById('status-form-{{ $quotation->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }"><i class="material-icons">done</i></button>
                                                @endif
                                                <form id="delete-form-{{ $quotation->id }}" action="{{ route('quotation.destory',$quotation->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="{{ route('quotation.show',$quotation->id) }}" class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $quotation->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
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