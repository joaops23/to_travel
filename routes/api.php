<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\hospedagemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('auth.login', [AuthController::class, 'login'])->name('login');

Route::post('cadHosp', [hospedagemController::class, 'cadastro'])->name('cadHosp');
Route::get("getHospedagem/{id}", [hospedagemController::class, 'getHospedagem'])->name('getHospedagem');