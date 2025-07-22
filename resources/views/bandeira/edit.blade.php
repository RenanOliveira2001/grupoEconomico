@extends('layouts.main')

@section('title', 'Cadastrar Nova Bandeira')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de Nova Bandeira</h1>
        <form action="/bandeira/update/{{ $bandeira->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">Nome da Bandeira</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="{{ $bandeira->nome }}">
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="grupo_economico" >Grupo Econômico: </label>
                <select name="grupo_economico" id="grupo_economico">
                    @forelse ($grupoEconomico as $grpEconomico)
                        <option value="{{ $bandeira->grupo_economico }}">{{ $grpEconomico->nome }}</option>
                    @empty
                        Nenhum grupo econômico foi cadastrada, por favor cadastrar
                    @endforelse
                </select>
            </div>
            <button id="btnSave" type="submit" class="btn btn-primary">Salvar</button>
            <a href="/bandeira" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        </form>
    </div>
@endsection