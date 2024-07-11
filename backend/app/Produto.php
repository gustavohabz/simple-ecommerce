<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = ['titulo', 'preco', 'descricao', 'quantidadeEmEstoque', 'rotuloUnico', 'tipo_produto_id'];
}
