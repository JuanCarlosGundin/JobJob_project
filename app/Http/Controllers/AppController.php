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
        left join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
        where tbl_usuarios.id_perfil=3 and (tbl_interaccion.id_iniciador is null or (tbl_interaccion.id_iniciador <> ? and tbl_interaccion.tipo_interaccion <> 2 and tbl_interaccion.coincidencia like 0))',[$id]);
        return response()->json($datos);
        }else{
        $datos=DB::select('select * from tbl_usuarios 
        left join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
        left join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
        where tbl_usuarios.id_perfil=2 and (tbl_interaccion.id_iniciador is null or (tbl_interaccion.id_iniciador <> ? and tbl_interaccion.tipo_interaccion <> 2 and tbl_interaccion.coincidencia like 0 ))',[$id]);
        return response()->json($datos);
        }   
    }

    function si(Request $request){
        $id=3;
        $idClient = $request->input('idClient');
        $datos=DB::select('select count(*) from tbl_interaccion
        where id_iniciador=? and id_interactuado=?',[$idClient,$id]);
        try{
        if($datos[0]->{'count(*)'}==1){
            DB::update('update tbl_interaccion set coincidencia = 1 where id_iniciador=? and id_interactuado=?',
           [$idClient,$id]);
           DB::insert('insert into tbl_interaccion (id_iniciador,id_interactuado,tipo_interaccion,estado_interaccion,coincidencia) 
           values (?,?,1,1,1)',[$id,$idClient]);
           return response()->json(1); 
        }else{
            DB::insert('insert into tbl_interaccion (id_iniciador,id_interactuado,tipo_interaccion,estado_interaccion,coincidencia) 
            values (?,?,1,1,0)',[$id,$idClient]);
            return response()->json(2);  
        }
    }catch (\Throwable $th) {
        return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
    }
           
    }

    function no(Request $request){
        $id=3;
        $idClient = $request->input('idClient');
        $datos=DB::select('select count(*) from tbl_interaccion
        where id_iniciador=? and id_interactuado=?',[$idClient,$id]);
        try{
        if($datos[0]->{'count(*)'}==1){
            DB::update('update tbl_interaccion set tipo_interaccion = 2 where id_iniciador=? and id_interactuado=?',
           [$idClient,$id]);
           return response()->json(1); 
        }else{
            DB::insert('insert into tbl_interaccion (id_iniciador,id_interactuado,tipo_interaccion,estado_interaccion,coincidencia) 
            values (?,?,2,1,0)',[$id,$idClient]);
            return response()->json(2);  
        }
    }catch (\Throwable $th) {
        return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
    }
           
    }
}
