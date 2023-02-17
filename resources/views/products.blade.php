@extends('layouts.main')

@section('title', 'Produtos')
@section('content')
    <h1>Tela de produtos</h1>
    @if ($busca != '')
        <p>Buscando por <span class="fw-bold">{{ $busca }}</span></p>
    @endif
    <a href="/">Voltar para a home</a>
@endsection
