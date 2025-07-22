@extends('layouts.main')

@section('navbar','Grupo Econômico')

@section('title', 'Grupos Econômicos')

@section('content')
    <div id="event-create-container" class="col-md-8 offset-md-3">
        <a href="/grupo_economico/create" id="btnCreate" type="submit" class="btn btn-outline-success">Cadastrar Novo Grupo</a>
        <a href="/servicos" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        <table border="1" id="tblGrpEconomico">
            <tr>
                <th>Id do Grupo</th>
                <th>Nome do Grupo</th>
                <th>Data de criação</th>
                <th>Última Atualização</th>
                <th>Ações</th>
            </tr>
            @forelse ($grupoEconomico as $grpEconomico)
                <tr>
                    <td>{{$grpEconomico->id}}</td>
                    <td>{{$grpEconomico->nome}}</td>
                    <td>{{ \Carbon\Carbon::parse($grpEconomico->dt_criacao)->format('d/m/Y') }}</td>
                     <td>{{ \Carbon\Carbon::parse($grpEconomico->ultima_atualizacao)->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="/grupo_economico/edit/{{ $grpEconomico->id }}" id="btnEdit" type="submit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="/grupo_economico/delete/{{ $grpEconomico->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
            @empty
                Não há nenhum Grupo Econômico Cadastrado
            @endforelse
        </table>
    </div>
@endsection