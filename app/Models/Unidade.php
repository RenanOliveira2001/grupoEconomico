<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidades';

    protected $fillable = ['nome_fantasia','razao_social','cnpj','unidade','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';

    public function bandeira(){
        return $this->belongsTo(Bandeira::class);
    }
    public function unidade(){
        return $this->hasMany(Colaborador::class);
    }
}
