@extends('layouts.app')
@section("content")
<h1>hello task app</h1>

@foreach($tasks as $task)
<div class="card @if($task->isCompleted()) border-success @endif" style='margin-bottom:20px ' >
  <div class="card-body">
    <p>{{$task->description}}</p>
    @if(! $task->isCompleted())
    <form action="/tasks/{{ $task->id }}" method="post">
        @method('PATCH')
        @csrf
        @if($task->isCompleted())
        <span class="badge rounded-pill text-bg-success">completed</span>        @endif
        <button class="btn btn-secondary" input="submit" href="#">{{$task->id}} complete</button>
    </form>
   
    @else
    <form action="/tasks/{{ $task->id }}" method="post">
        @method('DELETE')
        @csrf
        @if($task->isCompleted())
        <span class="badge rounded-pill text-bg-success">completed</span>        @endif
        <button class="btn btn-danger btn-block" input="submit" href="#">Remove</button>
    </form>
    @endif
  </div>
</div>
@endforeach
@endsection
