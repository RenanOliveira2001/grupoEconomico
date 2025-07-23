<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Unidade extends Model implements AuditableContract
{
    use Auditable;

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
