<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixaEntrada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf_cnpj_id');
            $table->string('cliente');
            $table->integer('id_solicitante')->unsigned();
            $table->foreign('id_solicitante')->references('id')->on('users');
            $table->integer('id_etapa')->unsigned();
            $table->foreign('id_etapa')->references('id')->on('etapas');
            $table->date('data_solicitacao');
            $table->date('data_aprovacao');
            $table->string('tipo_solicitacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caixaEntrada');
    }
};
