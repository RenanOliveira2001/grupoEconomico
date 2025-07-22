<?php

namespace App\Livewire;

use App\Models\GrupoEconomico;
use Exception;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class GrupoEconomicoForm extends Component
{
    public $nome;

    public function render()
    {
        return view('livewire.grupo-economico-form');
    }

    public function create(){
        
        try {
            
            GrupoEconomico::create(
            ['nome' => $this->nome,
            'dt_criacao' => now(),
            'ultima_atualizacao' => now()]
            );

            return redirect('/grupo_economico')->with('message', 'Grupo Econômico Cadastrado com sucesso!');
            
        } catch (Exception $e) {
            echo('Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        } 
    }
}
