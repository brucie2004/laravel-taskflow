<!-- resources/views/projects/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Projects') }}</div>

                <div class="card-body">
                    <!-- Form to create a new project -->
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Project name..." required>
                            <button class="btn btn-primary" type="submit">Add Project</button>
                        </div>
                    </form>

                    <hr>

                    <!-- List of existing projects -->
                    @if($projects->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">task count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         @foreach($projects as $project)
                                        <tr>
                                            <th scope="row">  {{$project->id}}</th>
                                            <th scope="row">  {{$project->title}} </th>
                                            <td scope="row">   {{$project->description}} </td>
                                            <td scope="row">   <span class="badge bg-primary rounded-pill">{{ $project->tasks->count() }}</span> </td>
                                            <td scope="row"> <a href="{{route('projects.show', $project->id)}}" class="btn btn-success">details</a></td>
                                            <td scope="row"> <a href="{{route('projects.editt', $project->id)}}" class="btn btn-warning">edit</a></td>
                                            <td scope="row">   
                                        <form action="{{route('projects.destroy', $project->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger" type="submit" value="Delete" >
                                        </form> </td>
                    

                                        </tr>    
                                        @endforeach
                                    </tr>
                                    
                                </tbody>
                                </table>
                            </div>
                                  @else
                        <p class="text-center">You have no projects yet. Create one above!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection