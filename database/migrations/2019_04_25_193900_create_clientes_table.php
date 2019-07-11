<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('nome');
            $table->string('cpf', 14)->primary();
            $table->string('rg')->unique();
            $table->string('endereco');
            $table->string('estadocivil');
            $table->string('profissao');
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
        Schema::dropIfExists('clientes');
    }
}
