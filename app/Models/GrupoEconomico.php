<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;


class GrupoEconomico extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'grupo_economicos';

    protected $fillable = ['nome','dt_criacao','ultima_atualizacao'];

    protected $casts = [
    'dt_criacao' => 'datetime',
    'ultima_atualizacao' => 'datetime',
    ];

    protected $guarded = [];

    protected $auditExclude = ['dt_criacao', 'ultima_atualizacao'];

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';
    
    public function bandeira(){
        return $this->hasMany(Bandeira::class,'grupo_economico');
    }
}
