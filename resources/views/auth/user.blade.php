@extends('layouts.app')

@section('title', config('app.name', 'ToDoing'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Alterar senha</h4>
                    <form class="form-block" method="POST" action='/user/{{ $user->id }}'>
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="lastPassword">Senha Atual</label>
                            <input id="lastPassword" class="form-control {{ $errors->has('lastPassword') ? 'border-danger' : '' }}" 
                            type="password" name="lastPassword" placeholder="Senha Atual" required value="{{ old('lastPassword') }}" />
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Senha Nova</label>
                            <input id="newPassword" class="form-control {{ $errors->has('newPassword') ? 'border-danger' : '' }}" 
                            type="password" name="newPassword" placeholder="Senha Nova" required value="{{ old('newPassword') }}" />
                        </div>
                        <div class="form-group">
                            <label for="newPassword_confirmation">Digite novamente a senha</label>
                            <input id="newPassword_confirmation" class="form-control {{ $errors->has('newPassword_confirmation') ? 'border-danger' : '' }}" 
                            type="password" name="newPassword_confirmation" placeholder="Repita a Senha" required value="{{ old('newPassword_confirmation') }}" />
                        </div>
                        @include('errors')
                        <button class="btn btn-primary" type="submit" name="password">Enviar</button>

                    </form>

                    <h4 class='mt-3'>Alterar e-mail</h4>
                    <form class="form-block" method="POST" action='/user/{{ $user->id }}'>
                        @method('PATCH')
                        @csrf
                        <div><p>Endereço atual: <a href="/user">{{ $user->email }}</a></p></div>
                        <div class="form-group">
                            <label for="newEmail">Novo endereço de e-mail</label>
                            <input id="newEmail" class="form-control {{ $errors->has('newEmail') ? 'border-danger' : '' }}" 
                            type="email" name="newEmail" placeholder="Insira o novo e-mail" required value="{{ old('newEmail') }}" />
                        </div>
                        <div class="form-group">
                            <label for="newEmail_confirmation">Digite novamente o endereço de e-mail</label>
                            <input id="newEmail_confirmation" class="form-control {{ $errors->has('newEmail_confirmation') ? 'border-danger' : '' }}" 
                            type="email" name="newEmail_confirmation" placeholder="Repita o e-mail" required value="{{ old('newEmail_confirmation') }}" />
                        </div>
                        @if($errors->hasBag('email'))
                            <div class="alert alert-danger">
                                {{ $errors->email->first() }}
                            </div>
                        @endif
                        <button class="btn btn-primary" type="submit" name="email">Enviar</button>

                    </form>

                    <div class="mt-4 font-weight-bold">
                        <a href="#">Enviar novo e-mail de verificação</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
