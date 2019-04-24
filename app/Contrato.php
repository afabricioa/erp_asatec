<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model{
    protected $fillable = [
        'cliente', 'corretor', 'empreendimento', 'lote', 'planta', 'tamanhoLote', 'valorLote', 'valorPlanta',
    ];
}
