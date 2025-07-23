<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Colaborador extends Model implements AuditableContract
{
    use Auditable;

    protected $table = 'colaboradores';

    protected $fillable = ['nome','email','cpf','unidade','dt_criacao','ultima_atualizacao'];

    protected $date_format = 'd/m/Y H:i:s';

    const CREATED_AT = 'dt_criacao';

    const UPDATED_AT = 'ultima_atualizacao';

    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }
}
