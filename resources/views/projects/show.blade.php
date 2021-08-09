@extends('layouts.app')

@section('title', $project->title )

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<h1>{{ $project->title }}</h1>
<p>
{{ $project->description }}
</p>
<p>
<a class="mb-3" href="/projects/{{ $project->id }}/edit">Editar</a>
</p>

@if($project->tasks->count())
    <div class="card">
        <div class="card-header">
            <h3>Tarefas</h3>
        </div>
        <div class="card-body">
            @foreach($project->tasks as $task)
                <form method="POST" action="/completed-tasks/{{ $task->id }}">
                @if( $task->completed )
                    @method('DELETE')
                @endif
                @csrf
                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }} >
                    <span class="{{ $task->completed ? 'is-complete' : '' }}">{{ $task->description }}</span>
                </form>
            @endforeach
        </div>
    </div>
@endif

<div class="card my-3">
    <div class="card-header">
        <h3>Adicionar tarefa<h3>
    </div>
    <div class="card-body">
        <form method="POST" class="form-inline" action="/projects/{{ $project->id }}/tasks">
                @csrf
                <input class="form-control w-100" type="text" name="description" placeholder="Nova tarefa" required>
                <button class="btn btn-primary my-2" type="submit">Adicionar</button>
        </form>
        @include('errors')
    </div>
</div>

@endsection
