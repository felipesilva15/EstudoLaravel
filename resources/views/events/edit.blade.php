@extends('layouts.main')

@section('title', 'Editando '.$event->title)
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3 p-3">
        <h1>Editando {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="image">Imagem do evento</label>
                <input type="file" name="image" id="image" class="form-control-file" placeholder="Nome do evento">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" width="100px" class="mt-2">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="title">Evento</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="title">Data do evento</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ substr($event->date,0,10) }}">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="city">Cidade</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Local do evento" value="{{ $event->city }}">
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="description">Descrição</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
            </div>
            <div class="form-group pb-3">
                <label class="fw-bold pb-1" for="description">Itens de infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras" {{ in_array('Cadeiras', $event->items) ? 'checked' : '' }}> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco" {{ in_array('Palco', $event->items) ? 'checked' : '' }}> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open bar" {{ in_array('Open bar', $event->items) ? 'checked' : '' }}> Open bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food" {{ in_array('Open food', $event->items) ? 'checked' : '' }}> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes" {{ in_array('Brindes', $event->items) ? 'checked' : '' }}> Brindes
                </div>
            </div>
            <div class="form-group pb-3">
                <input class="fw-bold" type="checkbox" name="private" id="private" class="pe-1" value="1" {{ $event->private == 1 ? 'checked' : '' }}>
                <label for="private">Evento privado</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar evento">
        </form>
    </div>
@endsection
