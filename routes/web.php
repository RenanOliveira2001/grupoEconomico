<?php

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEcononomicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/grupo_economico', [GrupoEcononomicoController::class, 'index']);
Route::get('/grupo_economico/create', [GrupoEcononomicoController::class, 'create']);
Route::post('/grupo_economico/store',[GrupoEcononomicoController::class, 'store']);
Route::get('/grupo_economico/edit/{id}',[GrupoEcononomicoController::class, 'edit']);
Route::put('/grupo_economico/update/{id}',[GrupoEcononomicoController::class, 'update']);
Route::get('/bandeira/create',[BandeiraController::class,'create']);
Route::post('/bandeira/store',[BandeiraController::class, 'store']);
Route::get('/bandeira/edit/{id}',[BandeiraController::class, 'edit']);