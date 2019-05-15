@extends('layouts.app')

@section('title','Partners')

@push('css')
    
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('partner.create') }}" class="btn btn-primary">Add New</a>
                    
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Partners</h4>
                        </div>
                        <div class="card-content table-responsive table-custom">
                            <table id="table" class="table table-striped table-hover"  cellspacing="0" width="100%" height="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($partners as $key=>$partner)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $partner->name }}</td>
                                            <td>{{ $partner->description }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/partner/'.$partner->image) }}" style="height: 100px; width: 100px" alt="fire fighter images"></td>
                                            <td>{{ $partner->created_at->toFormattedDateString()}}</td>
                                            <td>{{ $partner->updated_at->toFormattedDateString()}}</td>
                                            <td>
                                            <a href="{{ route('partner.edit',$partner->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                                                <form id="delete-form-{{ $partner->id }}" action="{{ route('partner.destroy',$partner->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $partner->id }}').submit();
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