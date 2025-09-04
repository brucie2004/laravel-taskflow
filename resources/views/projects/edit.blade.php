@extends('layouts.app')

@section('content')

<div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>    
        @endif
    </div>




    <h1>edit project</h1>
<br>
    <form action="{{Route('projects.updatte',$project)}}" method="head">
        @csrf   

        <label for="">title</label>
        <input type="text" name="title" value="{{$project->title}}">
        <br>
         <label for="">description</label>
        <input type="text" name="description" value="{{$project->description}}">
<br>
       
        <br>
        <br>

        <button class="btn bsb-btn-xl btn-primary py-3" type="submit">update project</button>

    </form>
    

@endsection