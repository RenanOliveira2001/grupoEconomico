@extends('layouts.main')

@section('title', 'Grupos Econômicos')

@section('content')
    <div id="event-create-container" class="col-md-8 offset-md-3">
        <a href="/colaborador/create" id="btnCreate" type="submit" class="btn btn-outline-success">Cadastrar Novo Colaborador</a>
        @forelse ($colaborador as $func)
            <table border="1" id="tblUnidade">
                <tr>
                    <th>Id Colaborador</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th>Data de criação</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
                    <tr>
                        <td>{{$func->id}}</td>
                        <td>{{$func->nome}}</td>
                        <td>{{$func->email}}</td>
                        <td>{{$func->CPF}}</td>
                        <td>{{$unidade}}</td>
                        <td>{{$func->dt_criacao}}</td>
                        <td>{{$func->ultima_atualizacao}}</td>
                        <td>
                            <a href="/coloborador/edit/{{ $func->id }}" id="btnEdit" type="submit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                            <form action="/colaborador/delete/{{ $func->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
            </table>
        @empty
            Não há nenhum Colaborador cadastrado
        @endforelse
    </div>
@endsection