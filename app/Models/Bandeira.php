<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandeira extends Model
{
    protected $table = 'bandeiras';

    protected $fillable = ['nome','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';

    public function bandeira(){
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function unidade(){
        return $this->hasMany(Unidade::class);
    }
}
