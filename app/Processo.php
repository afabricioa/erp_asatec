<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model{

    protected $fillable = [
        'cliente_cpf', 'asscontrato', 'dataass', 'docterreno', 'dataterreno', 'engenharia', 'dataengenharia', 'docpessoal', 'datadocpessoal',
        'conformidade', 'dataconformidade', 'entrevista', 'dataentrevista', 'contratocaixa', 'datacaixa', 'cartorio1', 'datacartorio1',
        'obras', 'dataobras', 'cartorio2', 'datacartorio2', 'observacao', 'faseatual',
    ];

    protected $primaryKey = 'cliente_cpf';
    protected $keytype = 'string';

    public $incrementing = false;
}
