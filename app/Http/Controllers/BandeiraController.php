<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandeiraController extends Controller
{
    public function index(){
        $bandeira = Bandeira::orderBy('id','asc')->get();

        $selGrpEconomico = DB::select('SELECT A.NOME FROM GRUPO_ECONOMICOS A,
                                    BANDEIRAS B
                                    WHERE A.ID = B.GRUPO_ECONOMICO');
        
        if($selGrpEconomico != []){
            $grupoEconomico = $selGrpEconomico[0]->NOME;
        } else {
            $grupoEconomico = '';
        }

        return view('bandeira.index',['bandeira' => $bandeira,'grupoEconomico' => $grupoEconomico]);
    }

    public function create(){
        $grupoEconomico = GrupoEconomico::orderBy('id','asc')->get();

        return view('bandeira.create',['grupoEconomico' => $grupoEconomico]);
    }

    public function store(Request $request){
        try {

            $request->validate([
                'nome' => 'required|max:255',
                'grupo_economico' => 'required'
            ]);

            $bandeira = new Bandeira;

            $bandeira->nome = $request->nome;
            $bandeira->grupo_economico = $request->grupo_economico;
            $bandeira->dt_criacao = now();
            $bandeira->ultima_atualizacao = now();

            $bandeira->save();

            return redirect()->to('/bandeira')->with('msg','Bandeira cadastrada com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }

    public function edit($id){
        $bandeira = Bandeira::findOrFail($id);
        $grupoEconomico = GrupoEconomico::orderBy('id','asc')->get();

        return view('bandeira.edit',['bandeira' => $bandeira,'grupoEconomico' => $grupoEconomico]);
    }

    public function update(Request $request){
        try {
            
            $request->validate([
                'nome' => 'required|max:255',
                'grupo_economico' => 'required'
            ]);

            Bandeira::where('id','=',$request->id)
            ->update([
                'nome' => $request->nome,
                'grupo_economico' => $request->grupo_economico,
                'ultima_atualizacao' => now()
            ]);

            return redirect()->to('/bandeira')->with('msg','Bandeira atualizada com sucesso');

        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }

    public function delete($id){
        try{
            Bandeira::where('id','=',$id)->delete();

            return redirect('/bandeira')->with('msg', 'Bandeira excluída com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }
}
