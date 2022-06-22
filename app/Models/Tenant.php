<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $connection = 'main';
    protected $table = 'conexoes';
    protected $fillable = [
        'id_imobiliaria',
        'host',
        'user',
        'pass',
        'base',
        'flag_nao_autorizado'
    ];
}
