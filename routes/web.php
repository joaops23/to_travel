<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hospedagemController;

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

Route::group([
    'prefix' => 'app',
    'middleware' => 'auth' // Define que a rota só irá funcionar sob autenticação do usuario
], function (){
    Route::get('addHospedagem', [hospedagemController::class, 'Adicionar'])->name('app.addHospedagem');
    Route::get('listHospedagem', [hospedagemController::class, 'listagem'])->name('app.listHospedagem');
});