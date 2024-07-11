<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEnderecosEntregaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_enderecos_entrega', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 200);
            $table->string('cep', 8); //inserir sem formatação
            $table->string('bairro', 50);
            $table->string('complemento', 50)->nullable();
            $table->string('cidade', 50);
            $table->string('uf', 2);
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios'); // referencia a coluna 'id' na tabela 'usuario'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_enderecos_entrega', function (Blueprint $table){
            $table->dropForeign('usuario_enderecos_entrega_usuario_id_foreign'); // primeiro removendo fk (<tabela>_<id_estrangeira>_foreign)
            $table->dropColumn('usuario_id'); // remove tabela usuario_id
        });
        
        Schema::dropIfExists('usuario_enderecos_entrega');
    }
}
