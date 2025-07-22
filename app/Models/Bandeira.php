<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Bandeira extends Model implements AuditableContract
{

    use Auditable;

    protected $table = 'bandeiras';

    protected $fillable = ['id','nome', 'grupo_economico','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';

    public function bandeira(){
        return $this->belongsTo(GrupoEconomico::class, 'id');
    }

    public function unidade(){
        return $this->hasMany(Unidade::class);
    }
}
