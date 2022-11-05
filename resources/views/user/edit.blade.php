@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('user.update', ['user' => $user->id]) }}">
    @csrf
    @method('PUT')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Editar Usuário</strong>
            </div>
            
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>  
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required disabled>  
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('user.index') }}">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
            </div>        
        </div>
    </div>
</form>
@endsection