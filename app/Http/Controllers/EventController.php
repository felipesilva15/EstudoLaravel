<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $data = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else{
            $data = Event::all();
        }

        return view('welcome', ['events'=>$data, 'search'=>$search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event();

        // Dados simples
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private ?? 0;
        $event->description = $request->description;
        $event->items = $request->items;

        // Upload e vínculo da imagem ao evento
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $imageName = md5($request->image->getClientOriginalName() . strtotime('now')).'.'.$extension;

            $request->image->move(public_path('/img/events'), $imageName);

            $event->image = $imageName;
        }

        // Chave estrangeira do usuário
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        $user = auth()->user();
        $hasJoinedEvent = false;

        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if($userEvent['id'] == $id){
                    $hasJoinedEvent = true;
                }
            }
        }

        return view('events.show', ['event' => $event, 'eventOwner'=>$eventOwner, 'hasJoinedEvent'=>$hasJoinedEvent]);
    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;
        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events'=>$events, 'eventsAsParticipant'=>$eventsAsParticipant]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if($event->user_id != $user->id){
            return redirect('/dashboard');
        }

        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $request){
        $data = $request->all();

        // Upload e vínculo da imagem ao evento
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $imageName = md5($request->image->getClientOriginalName() . strtotime('now')).'.'.$extension;

            $request->image->move(public_path('/img/events'), $imageName);

            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença foi confirmada no evento '.$event->title);
    }

    public function leaveEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->detach($id);
        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu do evento '.$event->title);
    }
}
