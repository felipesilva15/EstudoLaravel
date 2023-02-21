@extends('layouts.main')

@section('title', "Felipe's events")
@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
                <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por {{ $search }}</h2>
        @else
            <h2>Próximos eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-12 col-sm-6 col-md-3">
                    @if ($event->image)
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    @else
                        <img src="/img/event_placeholder.jpg" alt="{{ $event->title }}">
                    @endif

                    <div class="card-body">
                        <div class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</div>
                        <div class="card-title">{{ $event->title }}</div>
                        <p class="card-participants">{{ count($event->users) }} Participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if (count($events) == 0 && $search)
                <p class="p-0">Não não foi possível encontrar nenhum evento com <span class="fw-bold">{{ $search }}</span>. <a href="/">Ver todos</a></p>
            @elseif ((count($events) == 0))
                <p class="p-0">Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection
