<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamanhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamanhos', function (Blueprint $table) {
            $table->id();
            $table->string('label', 20); // tamanhos de roupa (p, m, g e etc...) ou tamanho em comprimento
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos'); // referencia ao produto
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tamanhos', function (Blueprint $table){
            $table->dropForeign('tamanhos_produto_id_foreign'); // primeiro removendo fk (<tabela>_<id_estrangeira>_foreign)
            $table->dropColumn('produto_id'); // depois removendo a coluna
        });
        Schema::dropIfExists('tamanhos'); // apagando a tabela
    }
}
