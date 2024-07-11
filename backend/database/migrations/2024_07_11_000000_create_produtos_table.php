<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->decimal('preco', 8, 2);
            $table->string('descricao', 300);
            $table->integer('quantidadeEmEstoque');
            $table->string('rotuloUnico', 100)->unique(); // utilizado pra criar URLs amigáveis
            $table->unsignedBigInteger('tipo_produto_id');
            $table->timestamps();
            // todos os campos são obrigatórios pois contém a informação mínima para o produto ser cadastrado ou a compra ser realizada

            $table->foreign('tipo_produto_id')->references('id')->on('tipo_produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_tipo_produtos_id_foreign');
            $table->dropColumn('tipo_produto_id');
        });

        Schema::dropIfExists('produtos');
    }
}
