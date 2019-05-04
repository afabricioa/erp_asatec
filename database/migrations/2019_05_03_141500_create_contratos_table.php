<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->string('cliente_cpf')->primary();
            $table->foreign('cliente_cpf')->references('cpf')->on('clientes')->onDelete('cascade');
            $table->string('corretor')->nullable();
            $table->string('empreendimento')->nullable();
            $table->string('quadra')->nullable();
            $table->string('lote')->nullable();
            $table->double('planta')->nullable();
            $table->string('endereco')->nullable();
            $table->double('tamanhoLote')->nullable();
            $table->double('valorLote')->nullable();
            $table->double('valorPlanta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('contratos', function(Blueprint $table){
            $table->dropForeign(['cliente_cpf']);
        });
        Schema::dropIfExists('contratos');
    }
}
