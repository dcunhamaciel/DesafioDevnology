@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('user.create') }}" class="btn btn-primary">Novo Usuário</a>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <td class="col-md-1"></td>
                <td class="col-md-1"></td>
            </tr>        
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-secondary">Editar</a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection