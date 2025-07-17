<?php

use App\Http\Controllers\GrupoEcononomicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/grupo_economico', [GrupoEcononomicoController::class, 'index']);
Route::get('/grupo_economico/create', [GrupoEcononomicoController::class, 'create']);
Route::post('/grupo_economico/store',[GrupoEcononomicoController::class, 'store']);
Route::get('/grupo_economico/edit/{id}',[GrupoEcononomicoController::class, 'edit']);
Route::post('/grupo_economico/update',[GrupoEcononomicoController::class, 'update']);