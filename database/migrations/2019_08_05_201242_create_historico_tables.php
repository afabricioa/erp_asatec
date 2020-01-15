<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->string('cliente_cpf')->primary();
            $table->foreign('cliente_cpf')->references('cpf')->on('clientes')->onDelete('cascade');
            $table->string('descricao')->nullable();
            $table->string('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('historicos', function(Blueprint $table){
            $table->dropForeign(['cliente_cpf']);
        });
        Schema::dropIfExists('historicos');
    }
}
