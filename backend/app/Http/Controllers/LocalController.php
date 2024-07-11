<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocalController extends Controller
{
    public function getUfs(){
        $response = Http::get('http://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
        return $response->body();
    }

    public function getCidadeByUf($uf){
        $response = Http::get('http://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$uf.'/municipios');
        return $response->body();
    }

    public function getEnderecoByCep($cep){
        $response = Http::get('http://viacep.com.br/ws/'.$cep.'/json/');
        return $response->body();
    }
}
