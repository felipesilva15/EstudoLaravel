@extends('layouts.main')

@section('title', "Felipe's events")
@section('content')
    <h1>Título</h1>
    <img src="/img/banner.jpg">

    @if(10 > 5)
        <p>A condição do IF é true</p>
    @endif

    @if($nome == "Felipe")
        <p>O nome é Felipe.</p>
    @elseif($nome == "Felipe Silva")
        <p>O nome é Felipe Silva e tem {{ $idade }} anos.</p>
    @else
        <p>O nome não é Felipe, é {{ $nome }}.</p>
    @endif

    <p>Valor da variavel $nome: {{ $nome }}</p>

    @for ($i = 0; $i < count($array); $i++)
        <p>{{ $i }} - {{ $array[$i] }}</p>
    @endfor

    @php
        $nome = "Lucas";

        echo $nome;
    @endphp

    @foreach ($nomes as $nome)
        <p>{{ $loop->index }} - {{ $nome }}</p>
    @endforeach

    {{-- Este é um comentário do blade --}}
@endsection
