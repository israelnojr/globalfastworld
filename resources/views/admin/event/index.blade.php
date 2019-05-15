@extends('layouts.app')

@section('title','Events')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('event.create') }}" class="btn btn-primary">Add New</a>
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Events</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($events as $key=>$event)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/event/'.$event->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $event->description }}</td>
                                            <td>{{ $event->created_at->toFormattedDateString()}}</td>
                                            <td>{{ $event->updated_at->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{ route('event.edit',$event->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $event->id }}" action="{{ route('event.destroy',$event->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $event->id }}').submit();
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush