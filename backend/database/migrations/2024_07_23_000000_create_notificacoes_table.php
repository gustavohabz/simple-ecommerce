<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('url_redirecionamento')->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('notificacao_tipo_id');
            $table->unsignedBigInteger('produto_id')->nullable();
            $table->unsignedBigInteger('compra_id')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('notificacao_tipo_id')->references('id')->on('notificacao_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificacoes', function (Blueprint $table){
            $table->dropForeign('usuario_id');
            $table->dropForeign('notificacao_tipo_id');

            $table->dropColumn('usuario_id');
            $table->dropColumn('notificacao_tipo_id');
        });
        Schema::dropIfExists('notificacoes');
    }
}
