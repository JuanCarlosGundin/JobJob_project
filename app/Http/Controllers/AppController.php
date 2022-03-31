<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    function mostrar(Request $request){
        $id=2;
        $perfil=2;
        if($perfil==2){
        $datos=DB::select('select * from tbl_usuarios 
        left join tbl_empresa on tbl_usuarios.id=tbl_empresa.id_usuario
        left join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_iniciador
        where tbl_usuarios.id_perfil=3 and tbl_interaccion.id_iniciador is null or tbl_interaccion.id_iniciador <> ?',[$id]);
        return response()->json($datos);
        }else{
        $datos=DB::select('select * from tbl_usuarios 
        left join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
        left join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_iniciador
        where tbl_usuarios.id_perfil=2 and tbl_interaccion.id_iniciador is null or tbl_interaccion.id_iniciador <> ?',[$id]);
        return response()->json($datos);
        }   
    }

    function si(Request $request){
        $id=2;
           
    }
}
