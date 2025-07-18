@extends('layouts.main')

@section('title', 'Cadastrar Nova Bandeira')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de Nova Unidade</h1>
        <form action="/unidade/update/{{ $unidade->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">Razão Social</label>
                <input type="text" name="razao_social" id="razao_social" class="form-control" required value="{{ $unidade->razao_social }}">
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" required value="{{ $unidade->nome_fantasia }}">
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="bandeira" >Bandeira: </label>
                <select name="bandeira" id="bandeira">
                    @forelse ($bandeira as $flag)
                        <option value="{{ $unidade->bandeira }}">{{ $flag->nome }}</option>
                    @empty
                        Nenhum grupo econômico foi cadastrada, por favor cadastrar
                    @endforelse
                </select>
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control" required value="{{ $unidade->cnpj }}">
            </div>
            <button id="btnSave" type="submit" class="btn btn-primary">Salvar</button>
            <a href="/" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        </form>
    </div>
@endsection