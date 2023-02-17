<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data = [
        'nome' => "Felipe Silva",
        'idade' => 16,
        'array' => [10,20,30,40,50],
        'nomes' => ["Mariana", "João", "Marcelo", "Samanta", "José"]
    ];

    return view('welcome', $data);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {
    return view('products');
});
