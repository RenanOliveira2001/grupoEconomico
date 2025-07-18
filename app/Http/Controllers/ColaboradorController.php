<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Unidade;
use Exception;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function create(){
        $unidade = Unidade::orderBy('id')->get();

        return view('coloborador.create', ['unidade' => $unidade]);
    }

    public function store(Request $request){
        try {
            $colaborador = new Colaborador;

            $colaborador->nome = $request->nome;
            $colaborador->email = $request->email;
            $colaborador->cpf = $request->cpf;
            $colaborador->unidade = $request->unidade;
            $colaborador->dt_criacao = now();
            $colaborador->ultima_atualizacao = now();

            $colaborador->save();

            return redirect()->to('/')->with('msg','Colaborador cadastrado com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao cadastrar colaborador: '.$e->getMessage());
        }
    }

    public function edit($id){
        $colaborador = Colaborador::findOrFail($id);
        $unidade = Unidade::orderBy('id')->get();

        return view('coloborador.edit',['colaborador' => $colaborador, 'unidade' => $unidade]);
    }

    public function update(Request $request){
        try {
            Colaborador::where('id','=',$request->id)
            ->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'unidade' => $request->unidade,
                'ultima_atualizacao' => now()
            ]);

            return redirect()->to('/')->with('msg','Unidade atualizada com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao atualizar unidade: '.$e->getMessage());
        }
    }
}
