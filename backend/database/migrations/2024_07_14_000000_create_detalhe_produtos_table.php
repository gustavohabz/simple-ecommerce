<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalheProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->string('label', 100);
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
        Schema::table('detalhe_produtos', function (Blueprint $table) {
            $table->dropForeign('detalhe_produtos_produto_id_foreign'); // primeiro removendo fk (<tabela>_<id_estrangeira>_foreign)
            $table->dropColumn('produto_id');
        });
        Schema::dropIfExists('detalhe_produtos');
    }
}
