@extends('layout')

@section('content')

        <div class="container">
            <h1>Projects</h1>
                <ul class="navbar-nav">
                    @foreach ($projects as $project)

                            <li> 
                                <a href="{{asset('/projects')}}/{{$project->id}}">
                                    {{$project->title}} 
                                </a>
                            </li>    

                    @endforeach
                </ul>
        </div>
            <div class="container">
                @if (session('message'))
                <p>{{ session('message') }}</p>
                @endif
            </div>

@endsection