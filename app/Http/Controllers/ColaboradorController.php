<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Unidade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ColaboradorController extends Controller
{
    public function index(){
        $colaboradores = Colaborador::orderBy('id','asc')->get();

        $selUnidade = DB::select('SELECT A.NOME_FANTASIA FROM UNIDADES A,
                                    COLABORADORES B
                                    WHERE A.ID = B.UNIDADE');
        
        if($selUnidade != []){
            $unidade = $selUnidade[0]->NOME_FANTASIA;
        } else {
            $unidade = '';
        }

        return view('colaborador.index',['colaborador' => $colaboradores,'unidade' => $unidade]);
    }

    public function create(){
        $unidade = Unidade::orderBy('id')->get();

        return view('colaborador.create', ['unidade' => $unidade]);
    }

    public function store(Request $request){
        try {
            $colaborador = new Colaborador;

            $request->validate([
                'nome' => 'required|max:255',
                'email' => 'required|unique:colaboradores|max:255',
                'cpf' => 'required|max:255',
                'unidade' => 'required'
            ]);
        
            $colaborador->nome = $request->nome;
            $colaborador->email = $request->email;
            $colaborador->cpf = $request->cpf;
            $colaborador->unidade = $request->unidade;
            $colaborador->dt_criacao = now();
            $colaborador->ultima_atualizacao = now();

            $colaborador->save();

            return redirect()->to('/colaborador')->with('msg','Colaborador cadastrado com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao cadastrar colaborador: '.$e->getMessage());
        }
    }

    public function edit($id){
        $colaborador = Colaborador::findOrFail($id);
        $unidade = Unidade::orderBy('id')->get();

        return view('colaborador.edit',['colaborador' => $colaborador, 'unidade' => $unidade]);
    }

    public function update(Request $request){
        try {

            $request->validate([
                'nome' => 'required|max:255',
                'email' => 'required|max:255',
                'cpf' => 'required|max:255',
                'unidade' => 'required'
            ]);

            Colaborador::where('id','=',$request->id)
            ->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'unidade' => $request->unidade,
                'ultima_atualizacao' => now()
            ]);

            return redirect()->to('/colaborador')->with('msg','Colaborador atualizado com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg','Erro ao atualizar unidade: '.$e->getMessage());
        }
    }

    public function delete($id){
        try{
            Colaborador::where('id','=',$id)->delete();

            return redirect('/colaborador')->with('msg', 'Colaborador excluído com sucesso');
        } catch(Exception $e){
            return redirect()->back()->with('msg',$e->getMessage());
        }
    }
}
