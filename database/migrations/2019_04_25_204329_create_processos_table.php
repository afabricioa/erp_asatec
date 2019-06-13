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
            $table->string('cliente_cpf')->primary();
            $table->foreign('cliente_cpf')->references('cpf')->on('clientes')->onDelete('cascade');
            $table->string('asscontrato')->nullable();
            $table->date('dataass')->nullable();
            $table->string('docterreno')->nullable();
            $table->date('dataterreno')->nullable();
            $table->string('engenharia')->nullable();
            $table->date('dataengenharia')->nullable();
            $table->string('docpessoal')->nullable();
            $table->date('datadocpessoal')->nullable();
            $table->string('conformidade')->nullable();
            $table->date('dataconformidade')->nullable();
            $table->string('entrevista')->nullable();
            $table->date('dataentrevista')->nullable();
            $table->string('contratocaixa')->nullable();
            $table->date('datacaixa')->nullable();
            $table->string('cartorio1')->nullable();
            $table->date('datacartorio1')->nullable();
            $table->string('obras')->nullable();
            $table->date('dataobras')->nullable();
            $table->string('cartorio2')->nullable();
            $table->date('datacartorio2')->nullable();
            $table->string('observacao')->nullable();
            $table->string('faseatual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('processos', function(Blueprint $table){
            $table->dropForeign(['cliente_cpf']);
        });
        Schema::dropIfExists(['processos']);
    }
}
