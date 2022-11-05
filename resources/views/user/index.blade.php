@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary">Novo Usuário</button>
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
                        <button type="button" class="btn btn-secondary float-center">Alterar</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection