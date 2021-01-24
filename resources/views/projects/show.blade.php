@extends('layout')

@section('content')
    <div class="container">
        <h4>{{$project->title}}</h4>

            <div>
                <p>{{$project->description}}</p>
                    <p>
                        <a href="{{asset('/projects')}}/{{$project->id}}/edit">Edit</a>
                    </p>
            </div>
                @if ($project->tasks->count())
    <div>
        @foreach ($project->tasks as $task)
            <div class="form-check card py-2">
                <form action="{{asset('/completed-task')}}/{{$task->id}}" method="POST">
                    @if ($task->completed)
                        @method('DELETE')
                    @endif
                    @csrf
                    <label class="form-check-label {{$task->completed ? 'isline' : ''}}" for="completed">
                        <input type="checkbox" class="form-check-input" name="completed" 
                            onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                            {{ $task->description }}
                    </label>
                </form>
            </div>
        @endforeach
    </div> 
                @endif
                    <br>
                <form method="POST" action="{{ asset('/projects') }}/{{ $project->id }}/tasks">
                    @csrf
                    <div class="card py-2">
                        <label for="task">New Task</label>
                        <input class="form-control" type="text" name="description" required> 
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                    <br><br>
                    @include('errors') 
                </form>         
    </div>
    
@endsection