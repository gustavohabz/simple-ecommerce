<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Usuario;

class UsuarioController extends Controller
{
    public function cadastraUsuario(Request $request){
        Usuario::create($request->all());
    }
}
