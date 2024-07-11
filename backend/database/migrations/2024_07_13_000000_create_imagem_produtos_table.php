<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('label', 100)->nullable(); // poderá ser usado ou como uma descrição da imagem ou apenas pra inserir no atributo alt da tag img
            $table->string('url', 500); // no futuro vai receber arquivos de upload, talvez mude
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
        Schema::table('imagem_produtos', function (Blueprint $table) {
            $table->dropForeign('imagem_produtos_produto_id_foreign'); // primeiro removendo fk (<tabela>_<id_estrangeira>_foreign)
            $table->dropColumn('detalhe_produtos');
        });
        Schema::dropIfExists('imagem_produtos');
    }
}
