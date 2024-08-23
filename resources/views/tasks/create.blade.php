@extends('layouts.app')
@section('content')
    <h1>Create new todo</h1>
    @if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
 
<ul>
 <li>{{$error}}</li>   
</ul>
</div>
@endforeach
@endif
    <form method="POST" action="/tasks">
        @csrf
        <div class="form-group">
            <label for="descriotion">task description</label>
            <input type="text" class="form-control" name="description"/>
            
        </div>
        @error('description')
        <div class="alert alert-danger" role="alert">
 {{$message}}
</div>
@enderror
<div class="form-group">
    <button type="submit" class="btn btn-primary" >create task</button>
</div>
    </form>
@endsection