@extends('layout')

@section('title', 'Edit Project')

@section('content')

<h2>Editar</h2>

<form method="POST" class="form-block" action='/projects/{{ $project->id }}'>
    @method('PATCH') 
    @csrf

    <div class="form-group">
        <label for="title">Título</label>
        <input id="title" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" 
        type="text" name="title" placeholder="title" 
        value="{{ $errors->has('title') ? old('title') : $project->title }}" required />
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea id="description" class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" 
        name="description" required>{{ $errors->has('description') ? old('description') : $project->description }}</textarea>
    </div>

    @if($errors->any())
        <div class="text-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button class="btn btn-primary" type="submit">Enviar</button>

</form>

<form method="POST" class="mt-2" action="/projects/{{ $project->id }}">
    @method('DELETE')
    @csrf

    <button class="btn btn-danger" type="submit">Deletar</button>

</form>

@endsection
