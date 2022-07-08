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
        Schema::create('chat_mensagem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_chat')->unsigned();
            $table->foreign('id_chat')->references('id')->on('chat');
            $table->integer('id_remetente')->unsigned();
            $table->foreign('id_remetente')->references('id')->on('users');
            $table->string('mensagem');
            $table->datetime('data_criacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_mensagem');
    }
};
