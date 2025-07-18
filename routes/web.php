<?php

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEcononomicoController;
use App\Http\Controllers\UnidadeController;
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
Route::put('/bandeira/update/{id}',[BandeiraController::class, 'update']);
Route::get('/unidade/create',[UnidadeController::class,'create']);
Route::post('/unidade/store',[UnidadeController::class, 'store']);
Route::get('/unidade/edit/{id}',[UnidadeController::class, 'edit']);
Route::put('/unidade/update/{id}',[UnidadeController::class, 'update']);
Route::get('/colaborador/create',[UnidadeController::class,'create']);
Route::post('/colaborador/store',[UnidadeController::class, 'store']);
Route::get('/colaborador/edit/{id}',[UnidadeController::class, 'edit']);
Route::put('/colaborador/update/{id}',[UnidadeController::class, 'update']);