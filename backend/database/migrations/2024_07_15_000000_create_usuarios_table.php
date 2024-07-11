<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo', 200);
            $table->string('email', 150);
            $table->string('telefone', 12); //inserir sem formatação
            $table->dateTime('data_nascimento');
            $table->string('logradouro_pessoal', 200);
            $table->string('cep_pessoal', 8); //inserir sem formatação
            $table->string('bairro_pessoal', 50);
            $table->string('complemento_pessoal', 50)->nullable();
            $table->string('cidade_pessoal', 50);
            $table->string('uf_pessoal', 2);
            $table->integer('ativo')->default(1); // 0 = inativo, 1 = ativo
            $table->integer('bloqueado')->default(0); // 0 = ok, 1 = bloqueado
            $table->integer('permissao')->default(1); // 0 = admin, 1 = cliente; os usuários admin serão criados por proprios admins futuramente
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
        Schema::dropIfExists('usuarios');
    }
}
