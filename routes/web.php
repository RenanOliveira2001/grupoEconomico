<?php

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEcononomicoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicos',function(){
    return view('dashboard');
});

Route::get('/grupo_economico', [GrupoEcononomicoController::class, 'index'])->middleware('auth');
Route::get('/grupo_economico/create', [GrupoEcononomicoController::class, 'create'])->middleware('auth');
Route::post('/grupo_economico/store',[GrupoEcononomicoController::class, 'store'])->middleware('auth');
Route::get('/grupo_economico/edit/{id}',[GrupoEcononomicoController::class, 'edit'])->middleware('auth');
Route::put('/grupo_economico/update/{id}',[GrupoEcononomicoController::class, 'update'])->middleware('auth');
Route::delete('/grupo_economico/delete/{id}',[GrupoEcononomicoController::class, 'delete'])->middleware('auth');

Route::get('/bandeira',[BandeiraController::class,'index'])->middleware('auth');
Route::get('/bandeira/create',[BandeiraController::class,'create'])->middleware('auth');
Route::post('/bandeira/store',[BandeiraController::class, 'store'])->middleware('auth');
Route::get('/bandeira/edit/{id}',[BandeiraController::class, 'edit'])->middleware('auth');
Route::put('/bandeira/update/{id}',[BandeiraController::class, 'update'])->middleware('auth');
Route::delete('/bandeira/delete/{id}',[BandeiraController::class, 'delete'])->middleware('auth');

Route::get('/unidade',[UnidadeController::class,'index'])->middleware('auth');
Route::get('/unidade/create',[UnidadeController::class,'create'])->middleware('auth');
Route::post('/unidade/store',[UnidadeController::class, 'store'])->middleware('auth');
Route::get('/unidade/edit/{id}',[UnidadeController::class, 'edit'])->middleware('auth');
Route::put('/unidade/update/{id}',[UnidadeController::class, 'update'])->middleware('auth');
Route::delete('/unidade/delete/{id}',[UnidadeController::class, 'delete'])->middleware('auth');

Route::get('/colaborador',[ColaboradorController::class,'index'])->middleware('auth');
Route::get('/colaborador/create',[ColaboradorController::class,'create'])->middleware('auth');
Route::post('/colaborador/store',[ColaboradorController::class, 'store'])->middleware('auth');
Route::get('/colaborador/edit/{id}',[ColaboradorController::class, 'edit'])->middleware('auth');
Route::put('/colaborador/update/{id}',[ColaboradorController::class, 'update'])->middleware('auth');
Route::put('/colaborador/delete/{id}',[ColaboradorController::class, 'delete'])->middleware('auth');

Route::get('relatorio' , [ReportController::class,'index'] )->name('relatorio');

Route::post('report' , [ReportController::class,'generateReport'] )->name('report');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
