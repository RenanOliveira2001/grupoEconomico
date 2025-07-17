@extends('layouts.main')

@section('title', 'Gestão de Grupos Econômicos')

@section('content')
<div id="welcome-container" class="col-md-12">
    <h1>Seja Bem-Vindo ao Gestão Inteligente</h1>
    <h6>Este sistema disponbiliza funções incriveis, como gestão de grupos econômicos, colaboradores, unidades e bandeira</h6>
    <form action="/login">
        <input type="submit" class="btn btn-primary" value="Clique Aqui para iniciar sua experiência">
    </form>
</div>
@endsection