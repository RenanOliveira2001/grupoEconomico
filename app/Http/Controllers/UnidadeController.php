<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use App\Models\Unidade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadeController extends Controller
{
     public function index(){
        $unidade = Unidade::orderBy('id','asc')->get();

        $selBandeira = DB::select('SELECT A.NOME FROM BANDEIRAS A,
                                    UNIDADES B
                                    WHERE A.ID = B.BANDEIRA');
        
        if($selBandeira != []){
            $bandeira = $selBandeira[0]->NOME;
        } else {
            $bandeira = '';
        }

        return view('unidade.index',['unidade' => $unidade,'bandeira' => $bandeira]);
    }

    public function create(){
        $bandeira = Bandeira::orderBy('id')->get();

        return view('unidade.create', ['bandeira' => $bandeira]);
    }

    public function store(Request $request){
        try {
            $unidade = new Unidade;

            $unidade->razao_social = $request->razao_social;
            $unidade->nome_fantasia = $request->nome_fantasia;
            $unidade->bandeira = $request->bandeira;
            $unidade->cnpj = $request->cnpj;
            $unidade->dt_criacao = now();
            $unidade->ultima_atualizacao = now();

            $unidade->save();

            return redirect()->to('/unidade')->with('msg','Unidade cadastrada com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao cadastrar unidade: '.$e->getMessage());
        }
    }

    public function edit($id){
        $unidade = Unidade::findOrFail($id);
        $bandeira = Bandeira::orderBy('id')->get();

        return view('unidade.edit',['unidade' => $unidade, 'bandeira' => $bandeira]);
    }

    public function update(Request $request){
        try {
            Unidade::where('id','=',$request->id)
            ->update([
                'razao_social' => $request->razao_social,
                'nome_fantasia' => $request->nome_fantasia,
                'bandeira' => $request->bandeira,
                'cnpj' => $request->cnpj,
                'ultima_atualizacao' => now()
            ]);

            return redirect()->to('/unidade')->with('msg','Unidade atualizada com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao atualizar unidade: '.$e->getMessage());
        }
    }

    public function delete($id){
        try{
            Unidade::where('id','=',$id)->delete();

            return redirect('/unidade')->with('msg', 'Unidade excluída com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }
}
