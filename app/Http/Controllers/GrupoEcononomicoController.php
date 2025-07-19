<?php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Exception;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Notice;

class GrupoEcononomicoController extends Controller
{
    public function index(){
        $grupoEconomico = GrupoEconomico::orderBy('id')->get();

        return view('grupo_economico.index', ['grupoEconomico' => $grupoEconomico]);
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

            return redirect('/grupo_economico')->with('msg', 'Grupo Cadastrado com sucesso!');
        } catch(Exception $e){
            return redirect()->back()->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $grupoEconomico = GrupoEconomico::findOrFail($id);

        return view('grupo_economico.edit', ['grpEconomico' => $grupoEconomico]);
    }

    public function update(Request $request){
        try{
            GrupoEconomico::where('id', '=',$request->id)->update([
                'nome' => $request->nome,
                'ultima_atualizacao' => now()
            ]);

            return redirect('/grupo_economico')->with('msg', 'Grupo Econômico alterado com Sucesso');
        } catch(Exception $e) {
            return redirect()->back()->with('msg', 'Erro ao atualizar o grupo econômico: ' . $e->getMessage());
        }
    }

    public function delete($id){
        try {
            GrupoEconomico::where('id','=',$id)->delete();

            return redirect('/grupo_economico')->with('msg', 'Grupo Econômico excluído com sucesso com Sucesso');
        } catch (Exception $e){
            return redirect()->back()->with('msg', 'Erro ao deletar o grupo econômico: ' . $e->getMessage());
        }
    }
}