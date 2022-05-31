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
            $table->id('id');
            $table->string('cpf_cnpj_id');
            $table->string('cliente');
            $table->string('solicitante');
            $table->string('etapa');
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
        //
    }
};
