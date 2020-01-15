<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model{
    protected $fillable = [
        'cliente_cpf', 'descricao', 'data',
    ];
}
