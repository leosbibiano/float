<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $connection = 'tenant';
    protected $table = 'usuarios';
    protected $fillable = [
        'token'
    ];

    public $timestamps = false;

    use HasFactory;
}
