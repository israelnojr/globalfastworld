@extends('layouts.app')

@section('title','Projects')

@push('css')
    
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('project.create') }}" class="btn btn-primary">Add New</a>
                    
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Projects</h4>
                        </div>
                        <div class="card-content table-responsive table-custom">
                            <table id="table" class="table table-striped table-hover"  cellspacing="0" width="100%" height="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($projects as $key=>$project)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/project/'.$project->image) }}" style="height: 100px; width: 100px" alt="fire fighter images"></td>
                                            <td>{{ $project->created_at->toFormattedDateString()}}</td>
                                            <td>{{ $project->updated_at->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{ route('project.edit',$project->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $project->id }}" action="{{ route('project.destroy',$project->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $project->id }}').submit();
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