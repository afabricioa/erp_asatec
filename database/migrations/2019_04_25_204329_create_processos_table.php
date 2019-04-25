<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf');
            $table->string('asscontrato');
            $table->date('dataass');
            $table->string('docterreno');
            $table->date('dataterreno');
            $table->string('engenharia');
            $table->date('dataengenharia');
            $table->string('docpessoal');
            $table->date('datadocpessoal');
            $table->string('conformidade');
            $table->date('dataconformidade');
            $table->string('entrevista');
            $table->date('dataentrevista');
            $table->string('contratocaixa');
            $table->date('datacaixa');
            $table->string('catorio1');
            $table->date('datacatorio1');
            $table->string('obras');
            $table->date('dataobras');
            $table->string('cartorio2');
            $table->date('datacartorio2');
            $table->string('observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processos');
    }
}
