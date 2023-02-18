<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

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

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private ?? 0;
        $event->description = $request->description;
        $event->items = $request->items;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $imageName = md5($request->image->getClientOriginalName() . strtotime('now')).'.'.$extension;

            $request->image->move(public_path('/img/events'), $imageName);

            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
