<?php

use App\Http\Controllers\GrupoEcononomicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/grupo_economico/create', [GrupoEcononomicoController::class, 'create']);