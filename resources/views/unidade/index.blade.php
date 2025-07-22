@extends('layouts.main')

@section('title', 'Grupos Econômicos')

@section('navbar', 'Unidade')

@section('content')
    <div id="event-create-container" class="col-md-8 offset-md-3">
        <a href="/unidade/create" id="btnCreate" type="submit" class="btn btn-outline-success">Cadastrar Nova Unidade</a>
        <a href="/servicos" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        <table border="1" id="tblUnidade">
            <tr>
                <th>Id da Unidade</th>
                <th>Razão Social</th>
                <th>Nome Fanstasia</th>
                <th>CNPJ</th>
                <th>Bandeira</th>
                <th>Data de criação</th>
                <th>Última Atualização</th>
                <th>Ações</th>
            </tr>
            @forelse ($unidade as $un)
                    <tr>
                        <td>{{$un->id}}</td>
                        <td>{{$un->razao_social}}</td>
                        <td>{{$un->nome_fantasia}}</td>
                        <td>{{$un->cnpj}}</td>
                        <td>{{$bandeira}}</td>
                        <td>{{ \Carbon\Carbon::parse($un->dt_criacao)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($un->ultima_atualizacao)->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="/unidade/edit/{{ $un->id }}" id="btnEdit" type="submit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                            <form action="/unidade/delete/{{ $un->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
            @empty
                Não há nenhuma Unidade cadastrada
            @endforelse
        </table>
    </div>
@endsection