<?php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Exception;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Notice;

class GrupoEcononomicoController extends Controller
{
    public function index(){
        return view('grupo_economico.index');
    }

    public function create(){
        return view('grupo_economico.create');
    }
    
    public function store(Request $request){
        try
        {
            $grupo_economico = new GrupoEconomico;

            $grupo_economico->nome = $request->nome;
            $grupo_economico->dt_criacao = now();
            $grupo_economico->ultima_atualizacao = now();

            $grupo_economico->save();

            return redirect('/')->with('msg', 'Grupo Cadastrado com sucesso!');
        } catch(Exception $e){
            echo('Erro ao gravar o Grupo Econômico: '. $e->getMessage());
        }
    }

    public function edit($id){
        $grpEconomico = GrupoEconomico::findOrFail($id);

        return view('grupo_economico.edit', ['grpEconomico' => $grpEconomico]);
    }

    public function update(Request $request){
        $data = $request->all();

        GrupoEconomico::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Grupo Econômico alterado com Sucesso');
    }
}