@extends('layouts.main')

@section('title', 'Grupos Econômicos')

@section('content')
    <div id="event-create-container" class="dashboard-events-container">
        <a href="/colaborador/create" id="btnCreate" type="submit" class="btn btn-outline-success">Cadastrar Novo Colaborador</a>
        <a href="/servicos" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        <table border="1" id="tblUnidade">
            <tr>
                <th>Id Colaborador</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Unidade</th>
                <th>Ações</th>
            </tr>
                @forelse ($colaborador as $func)               
                    <tr>
                        <td>{{$func->id}}</td>
                        <td>{{$func->nome}}</td>
                        <td>{{$func->email}}</td>
                        <td>{{$func->CPF}}</td>
                        <td>{{$unidade}}</td>
                        <td>
                            <a href="/coloborador/edit/{{ $func->id }}" id="btnEdit" type="submit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                            <form action="/colaborador/delete/{{ $func->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Não há nenhum Colaborador cadastrado
                @endforelse
        </table>
    </div>
@endsection