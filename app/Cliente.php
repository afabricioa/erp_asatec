<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'cpf', 'rg', 'endereco', 'estadocivil', 'profissao',
    ];

    protected $primaryKey = 'cpf';
    protected $keytype = 'string';

    public $incrementing = false;
}
