@extends('layouts.main')

@section('title', $event->title)
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6 mt-3">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6 mt-3">
                <h1>{{ $event->title }}</h1>
                <p class="event-city m-0"><span class="material-icons pe-2">location_on</span> {{ $event->city }}</p>
                <p class="events-participants m-0"><span class="material-icons pe-2">groups</span> {{ count($event->users) }} Participantes</p>
                <p class="event-owner m-0"><span class="material-icons pe-2">star</span> {{ $eventOwner['name'] }}</p>
                @if (!$hasJoinedEvent)
                    <form action="/events/join/{{ $event->id }}" method="POST">
                        @csrf
                        <a href="/events/join/{{ $event->id }}" class="btn btn-primary mt-3" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit()">Confirmar presença</a>
                    </form>
                @else
                    <p class="already-joined-msg my-2 p-1">Você está participando deste evento.</p>
                @endif
                <h3 class="mt-3">O evento conta com</h3>
                <ul id="items-list" class="ps-0">
                    @foreach ($event->items as $item)
                        <li><span class="material-icons pe-2">play_arrow</span> {{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12 mt-3" id="description-container fw-bold">
                <h3 class="fw-bold">Sobre o evento</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>
@endsection
