<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/conversor', function () {
    return view('conversor', [
        'conversoes' => App\Models\Conversao::orderBy('created_at', 'desc')->paginate(5)
    ]);})->name('conversor');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return view('users', [
        'users' => App\Models\User::orderBy('id', 'desc')->paginate(5)
    ]);})->name('users');

Route::post('/converter', [ 'as' => 'converter', 'uses' => 'ConversorController@converter' ], function () {});
Route::post('/gravar', [ 'as' => 'gravar', 'uses' => 'ConversorController@gravar' ], function () {});

