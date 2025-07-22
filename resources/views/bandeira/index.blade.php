@extends('layouts.main')

@section('title', 'Bandeira')

@section('content')
    <div id="event-create-container" class="col-md-8 offset-md-3">
        <a href="/bandeira/create" id="btnCreate" type="submit" class="btn btn-outline-success">Cadastrar Nova Bandeira</a>
        <a href="/servicos" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        <table border="1" id="tblBandeira">
            <tr>
                <th>Id da Bandeira</th>
                <th>Nome da Bandeira</th>
                <th>Grupo Econômico</th>
                <th>Data de criação</th>
                <th>Última Atualização</th>
                <th>Ações</th>
            </tr>
            @forelse ($bandeira as $flg)
                <tr>
                    <td>{{$flg->id}}</td>
                    <td>{{$flg->nome}}</td>
                    <td>{{$grupoEconomico}}</td>
                    <td>{{ \Carbon\Carbon::parse($flg->dt_criacao)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($flg->ultima_atualizacao)->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="/bandeira/edit/{{ $flg->id }}" id="btnEdit" type="submit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="/bandeira/delete/{{ $flg->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
            @empty
                Não há nenhuma Bandeira cadastrada
            @endforelse
        </table>
    </div>
@endsection