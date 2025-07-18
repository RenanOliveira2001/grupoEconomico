@extends('layouts.main')

@section('title', 'Serviços')

@section('content')
    <ul class="abas">
        <!-- Aqui, criação da primeira aba -->
        <li class="aba" id="aba-1">
        <a href="#grupo_economico">Grupo Economico</a>
    <section class="conteudo"> Grupo Economico </section></li>
        <li class="aba" id="aba-2">
        <a href="#aba-2">Aba 2</a> 
    <section class="conteudo"> Conteúdo da Aba 2 </section></li>
        <li class="aba" id="aba-3">
        <a href="#aba-3">Aba 3</a> 
    <section class="conteudo"> Conteúdo da Aba 3 </section></li>
        <li class="aba" id="aba-3">
        <a href="#aba-3">Aba 3</a> 
    <section class="conteudo"> Conteúdo da Aba 3 </section></li>  
    </ul>
@endsection