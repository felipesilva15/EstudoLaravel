@extends('layouts.main')

@section('title', 'Produto')
@section('content')
    @if ($id != null)
        <p>Exibindo o produto de ID {{ $id }}</p>
    @endif
@endsection
