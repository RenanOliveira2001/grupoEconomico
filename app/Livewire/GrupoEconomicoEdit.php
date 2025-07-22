<?php

namespace App\Livewire;

use App\Models\GrupoEconomico;
use Exception;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Symfony\Component\CssSelector\Node\FunctionNode;

class GrupoEconomicoEdit extends Component
{
    public $nome;

    public function render()
    {   
        return view('livewire.grupo-economico-edit');
    }

    public function mount($id){

        $grpEconomico = GrupoEconomico::findOrFail($id);

        $this->nome = $grpEconomico->nome;
    }

    public function update(){
        
        try {
            
            GrupoEconomico::update(
            ['nome' => $this->nome,
            'dt_criacao' => now(),
            'ultima_atualizacao' => now()]
            );

            session()->flash('message', 'Grupo Econômico alterado com sucesso!');
            return redirect('/grupo_economico');
        } catch (Exception $e) {
            session()->flash('message', 'Erro ao atualizar Grupo Econômico!');
            return redirect('/grupo_economico');
        } 
    }
}
