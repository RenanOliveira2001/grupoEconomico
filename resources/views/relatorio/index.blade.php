@extends('layouts.main')

@section('title', 'Cadastrar Novo Grupo Econômico')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Escolha o formato de Saída do Relatório</h1>
        <form method="POST" action="/report">
            @csrf
            <div class = "form-group" enctype="multipart/form-data">
                <label for="pdf">PDF</label>
                <input type="radio" id="extensao" name="extensao" value="pdf"/>
                <label for="xls">XLS</label>
                <input type="radio" id="extensao" name="extensao" value="xls"/>
            </div>
            <button id="btnSave" type="submit" class="btn btn-primary">Gerar</button>
            <a href="/servicos" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
        </form>
    </div>
@endsection