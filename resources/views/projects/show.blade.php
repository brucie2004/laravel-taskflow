@extends('layouts.app')

@section('content')
<h1 class="display-4" style="text-align: center;">{{ $project->title }}</h1>
<p>{{ $project->description }}</p>

<h2>Tasks</h2>


<div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">task_id</th>
              <th scope="col">task name</th>
              <th scope="col">task status</th>
              <th scope="col">task priority</th>
              <th scope="col">due date</th>
              </tr>
          </thead>
          <tbody>
            <tr>
                @foreach ($tasks as $task)
                <tr>
                    <th scope="row">  {{$task->id}} </th>
                    <td scope="row">   {{$task->name}} </td>
                    <td scope="row">   {{$task->status}} </td>
                    @if($task->priority < 25)
                        <td scope="row" style="background-color:blue">   {{$task->priority}} </td>
                        @elseif($task->priority < 60)
                    <td scope="row" style="background-color:yellow">   {{$task->priority}} </td>
                    @elseif($task->priority < 80)
                    <td scope="row" style="background-color:rgb(126, 9, 152)">   {{$task->priority}} </td>
                    @else
                    <td scope="row" style="background-color:red">   {{$task->priority}} </td>
                    @endif
                    <td scope="row">   {{$task->due_date}} </td>
                    <td scope="row"> <a href="{{route('tasks.start',$task->id)}}" class="btn btn-success">start task</a></td>
                    <td scope="row"> <a href="{{route('tasks.end',$task->id)}}" class="btn btn-warning">end task</a></td>
                    <td scope="row"> <a href="{{route('tasks.kill',$task->id)}}" class="btn btn-danger">delete task</a></td>
                </tr>    
                @endforeach
            </tr>
            
          </tbody>
        </table>
      </div>
<hr>
<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create a new task ? fill the folloing form</div>

                <div class="card-body">
                    <!-- Form to create a new task -->
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div>
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <input type="text" class="form-control" name="name" placeholder="task name..." required>
                            <br>
                            <h7>please enter due date</h7>
                            <br>
                            <input type="date" name="due_date" id="due_date" value="{{old('due_date')}}" class="form-control  @error('duedate') is-invalid @enderror" placeholder="Enter due date" />
                            <h6>please set priority (1-100)</h6>
                            <input type="number" name="priority" id="priority" value="{{old('priority')}}" class="form-control  @error('priority') is-invalid @enderror" placeholder="Enter priority" />
                            <button class="btn btn-primary" type="submit">Add task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection