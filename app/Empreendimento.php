<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empreendimento extends Model
{
    protected $fillable = [
        'nome', 'endereco', 'nLotes',
    ];
}
