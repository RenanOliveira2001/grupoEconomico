<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'colaboradores';

    protected $fillable = ['nome','email','cpf','unidade','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';

    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }
}
