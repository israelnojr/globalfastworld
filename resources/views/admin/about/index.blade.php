@extends('layouts.app')

@section('title','About GFW')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('about.create') }}" class="btn btn-primary">Create About</a>
                    
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">About Us</h4>
                        </div>
                        <div class="card-content table-responsive table-custom">
                            <table id="table" class="table table-striped table-hover"  cellspacing="0" width="100%" height="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($abouts as $key=>$about)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $about->title }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/about/'.$about->image) }}" style="height: 100px; width: 100px" alt="about global fast world"></td>
                                            <td>{{ $about->created_at->toFormattedDateString()}}</td>
                                            <td>{{ $about->updated_at->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{ route('about.edit',$about->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $about->id }}" action="{{ route('about.destroy',$about->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="{{ route('about.show',$about->id) }}" class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $about->id }}').submit();
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush