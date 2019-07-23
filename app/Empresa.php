<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model{

    protected $fillable = [
        'nome', 'cnpj', 'endereco', 'bairro', 'cidade', 'estado',
    ];
}
