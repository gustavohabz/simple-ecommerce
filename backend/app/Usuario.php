<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome_completo', 
        'email', 
        'telefone',
        'data_nascimento',
        'logradouro_pessoal',
        'cep_pessoal',
        'bairro_pessoal',
        'complemento_pessoal',
        'cidade_pessoal',
        'uf_pessoal',
        'ativo',
        'bloqueado',
        'permissao',
        'senha'];
}
