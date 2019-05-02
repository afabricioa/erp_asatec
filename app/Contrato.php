<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model{
    protected $fillable = [
        'cliente', 'corretor', 'empreendimento', 'quadra', 'lote', 'planta', 'tamanhoLote', 'valorLote', 'valorPlanta',
    ];
}
