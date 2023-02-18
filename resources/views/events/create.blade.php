@extends('layouts.main')

@section('title', 'Criar evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3 p-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="title">Evento</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="city">Cidade</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Local do evento">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="description">Descrição</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>
            <div class="form-group pb-3">
                <input class="fw-bold" type="checkbox" name="private" id="private" class="pe-1">
                <label for="private">Evento privado</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>
@endsection
