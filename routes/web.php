<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require_once __DIR__.'/auth.php';



Route::get('/', function () {
    return view('site.dashboard', ['title' => 'home']);
})->name('site.index');


Route::get('/contatos', function() {
    return view('site.contato');
})->name('site.contato');

//Route::get('/login', function() {
    //return view('site.login');
//})->name('site.login');