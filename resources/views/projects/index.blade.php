@extends('layouts.app')

@section('title', 'All Projects')

@section('content')

<h1>Todos os Projetos<h1>

<ul id="all-projects">

@foreach($projects as $project)

    <li>
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </li>

@endforeach

</ul>

<a class="btn btn-primary" href="/projects/create">Novo projeto</a>

@endsection