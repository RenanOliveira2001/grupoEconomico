<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class GrupoEconomico extends Model
{
    protected $table = 'grupo_economicos';

    protected $fillable = ['nome','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';
    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';
    
    public function bandeira(){
        return $this->hasMany(Bandeira::class);
    }
}
