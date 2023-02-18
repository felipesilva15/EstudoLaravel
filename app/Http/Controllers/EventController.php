<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $data = Event::all();

        return view('welcome', ['events'=>$data]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event();

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private ?? 0;
        $event->description = $request->description;

        $event->save();

        return redirect('/');
    }
}
