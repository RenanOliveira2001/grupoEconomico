<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;
use Exception;
use Illuminate\Http\Request;

class BandeiraController extends Controller
{
    public function create(){
        $grupoEconomico = GrupoEconomico::orderBy('id','asc')->get();

        return view('bandeira.create',['grupoEconomico' => $grupoEconomico]);
    }

    public function store(Request $request){
        try {
            $bandeira = new Bandeira;

            $bandeira->nome = $request->nome;
            $bandeira->grupo_economico = $request->grupo_economico;
            $bandeira->dt_criacao = now();
            $bandeira->ultima_atualizacao = now();

            $bandeira->save();

            return redirect()->to('/')->with('msg','Bandeira cadastrada com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }

    public function edit($id){
        $bandeira = Bandeira::findOrFail($id);
        $grupoEconomico = GrupoEconomico::orderBy('id','asc')->get();

        //dd($bandeira);

        return view('bandeira.edit',['bandeira' => $bandeira,'grupoEconomico' => $grupoEconomico]);
    }

    public function update(Request $request){
        try {
            Bandeira::where('id','=',$request->id)
            ->update([
                'nome' => $request->nome,
                'grupo_economico' => $request->grupo_economico,
                'ultima_atualizacao' => now()
            ]);

            return redirect()->to('/')->with('msg','Bandeira atualizada com sucesso');

        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }
}
