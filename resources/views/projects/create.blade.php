@extends('layout')

@section('title', 'Create Project')

@section('content')

<h2>Criar um projeto</h2>

<form class="form-block" method="POST" action='/projects'>
    @csrf

    <div class="form-group">
        <label for="title">Título</label>
        <input id="title" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" 
        type="text" name="title" placeholder="title" required value="{{ old('title') }}" />
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea id="description" class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" 
        name="description" placeholder="description" required >{{ old('description') }}</textarea>
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

@endsection