<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model{

    protected $fillable = [
        'cpf', 'asscontrato', 'dataass', 'docterreno', 'dataterreno', 'engenharia', 'dataengenharia', 'docpessoal', 'datadocpessoal',
        'conformidade', 'dataconformidade', 'entrevista', 'dataentrevista', 'contratocaixa', 'datacaixa', 'catorio1', 'datacatorio1',
        'obras', 'dataobras', 'cartorio2', 'datacartorio2', 'observacao', 
    ];
}
