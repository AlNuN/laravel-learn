@extends('layout')

@section('title', $project->title )

@section('content')

<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>

<a class="btn btn-primary" href="/projects/{{ $project->id }}/edit">Editar</a>

@endsection
