<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupoEcononomicoController extends Controller
{
    public function create(){
        return view('grupo_economico.create');
    }
}
