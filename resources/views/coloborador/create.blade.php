@extends('layouts.main')

@section('title', 'Cadastrar Novo Colaborador')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de Novo Colaborador</h1>
        <form action="/colaborador/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" required>
            </div>
            <div class = "form-group" enctype="multipart/form-data">
                <label for="unidade" >Unidade: </label>
                <select name="unidade" id="unidade">
                    <option value="">Selecione</option>
                    @forelse ($unidade as $un)
                        <option value="{{ $un->id }}">{{ $un->nome_fantasia }}</option>
                    @empty
                        Nenhuma unidade encontrada, por favor cadastrar
                    @endforelse
                </select>
            </div>
            <button id="btnSave" type="submit" class="btn btn-primary">Salvar</button>
            <a href="/" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        </form>
    </div>
@endsection