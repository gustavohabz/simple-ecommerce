<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data_compra')->useCurrent(); // coleta a data no momento em que o registro é feito automaticamente
            $table->decimal('frete', 8, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('status_compra_id');
            $table->unsignedBigInteger('produto_id');

            // FKs
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('status_compra_id')->references('id')->on('status_compras');
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function(Blueprint $table){
            $table->dropForeign('compras_usuario_id_foreign');
            $table->dropForeign('compras_status_compra_id_foreign');
            $table->dropForeign('compras_produto_id_foreign');

            $table->dropColumn('usuario_id');
            $table->dropColumn('status_compra_id');
            $table->dropColumn('produto_id');
        });
        Schema::dropIfExists('compras');
    }
}
