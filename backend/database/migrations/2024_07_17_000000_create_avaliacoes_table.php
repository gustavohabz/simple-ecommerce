<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->string('comentario', 300);
            $table->integer('avaliacao');
            $table->timestamp('data_avaliacao')->useCurrent(); // coleta a data no momento em que o registro é feito automaticamente
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos'); // referencia a coluna id na tabela produtos
            $table->foreign('usuario_id')->references('id')->on('usuarios'); // referencia a coluna id na tabela usuarios
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacoes', function(Blueprint $table){
            // removendo o foreign dos campos produto_id e usuario_id
            $table->dropForeign('avaliacoes_produto_id_foreign');
            $table->dropForeign('avaliacoes_usuario_id_foreign');

            // removendo as colunas produto_id e usuario_id
            $table->dropColumn('produto_id');
            $table->dropColumn('usuario_id');
        });
        
        // removendo a tabela
        Schema::dropIfExists('avaliacoes');
    }
}
