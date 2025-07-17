<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GrupoEconomico extends Model
{
    protected $table = 'grupos_economicos';
    protected $date_format = 'd/m/Y H:i:s';
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'ultima_atualizacao';
}
