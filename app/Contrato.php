<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model{
    protected $fillable = [
        'cliente_cpf', 'corretor', 'empreendimento', 'quadra', 'lote', 'planta', 'endereco', 'tipodacasa', 'tamanhoLote', 'valorLote', 'valorPlanta',
    ];

    protected $primaryKey = 'cliente_cpf';
    protected $keyType = 'string';

    public $incrementing = false;
}
