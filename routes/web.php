<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/user/{name?}', function (?string $name = null) {
    return $name;
});
Route::get('/user/{name?}', function (?string $name = 'pepe') {
    return $name;
});

Route::post('/reverse-me', function (Request $request) {
    $reversed = strrev($request->input('reverse_this'));
    return $reversed;
});

  Route::match(array('GET', 'POST'), '/ambas', function()
{
    return 'Hello World';
});

Route::get('/usuario/{id}', function (string $id) {
    return "hola usuario $id"; 
})->where('id', '[0-9]+');

Route::get('/user/{name}/{id}', function (string $name, string $id) {
    return "hola usuario $name con id:$id";
})->where(['name' => '[a-z]+','id' => '[0-9]+']);

// ejercicio 2

Route::get('/host', function () {
    return env('DB_HOST');
});
Route::get('/timezone', function () {
    return config('app.timezone');
});

