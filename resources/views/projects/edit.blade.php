@extends('layout')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Edit Project</h1>
                <form method ="POST" action="{{asset('projects')}}/{{$project->id}}" style="margin-bottom:1em">
                    {{-- {{csrf_fiedl()}} --}}
                    {{-- {{method_field('PATCH')}} --}}
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" 
                                placeholder="title" value="{{$project->title}}">
                    </div>
                    <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{$project->description}}</textarea>
                    </div>
                        
                        <button type="submit" class="btn btn-primary">Update Project</button>
                            
                </form>
                @include('errors')
                    <form method="POST" action="{{asset('projects')}}/{{$project->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Project</button>    
                    </form>
            </div>    
        </div>
    </div>  
@endsection