<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $data = [
            'nome' => "Felipe Silva",
            'idade' => 16,
            'array' => [10,20,30,40,50],
            'nomes' => ["Mariana", "João", "Marcelo", "Samanta", "José"]
        ];

        return view('welcome', $data);
    }

    public function create(){
        return view('events.create');
    }
}
