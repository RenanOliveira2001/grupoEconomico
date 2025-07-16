@extends('layouts.main')

@section('title', 'Cadastrar Novo Grupo Econômico')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastre o Novo Grupo</h1>
        <form action="/grupo_economico/store">
            @csrf
            <div class = "form-group" enctype="multipart/form-data">
                <label for="nome">Nome do Grupo</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
        </form>
    </div>
@endsection