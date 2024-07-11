<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('carrinhos', function (Blueprint $table){
            $table->dropForeign('carrinhos_produto_id_foreign');
            $table->dropForeign('carrinhos_usuario_id_foreign');

            $table->dropColumn('produto_id');
            $table->dropColumn('usuario_id');
        });
        Schema::dropIfExists('carrinhos');
    }
}
