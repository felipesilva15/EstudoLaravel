@extends('layouts.main')

@section('title', 'Criar evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3 p-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="image">Imagem do evento</label>
                <input type="file" name="image" id="image" class="form-control-file" placeholder="Nome do evento">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="title">Evento</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="title">Data do evento</label>
                <input type="date" name="date" id="date" class="form-control">
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
                <label class="fw-bold pb-1" for="description">Itens de infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras" class=""> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco" class=""> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open bar" class=""> Open bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food" class=""> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes" class=""> Brindes
                </div>
            </div>
            <div class="form-group pb-3">
                <input class="fw-bold" type="checkbox" name="private" id="private" class="pe-1">
                <label for="private">Evento privado</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>
@endsection
