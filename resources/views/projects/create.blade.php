@extends('layout')

@section('content')
<div class="container">
    <h1>Create a New Project</h1>
        <form action="{{asset('/projects')}}" method="POST">
            @csrf
                <div class="form-group">
                    <input class="form-control {{ $errors->has('title') ? 'has-error' : '' }}"
                        value="{{ old('title') }}" type="text" name="title" placeholder="project title" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" 
                    placeholder="project description" required>{{ old('description') }}</textarea>
                </div>
                <div>
                     <button class="btn btn-success" type="submit">Create Project</button>
                </div>
                <br>
                @include('errors')  
            </form>
                     
</div>
    
@endsection