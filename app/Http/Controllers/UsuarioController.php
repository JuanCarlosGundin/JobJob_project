<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //Zona Administrador
    public function vistaAdmin() {
        return view("admin");
    }

    public function leer(Request $req) {
        $filtro = $req->input('filtro');
        $Empresa = $req->input('Empresa');
        $Trabajador = $req->input('Trabajador');
        $Admin = $req->input('Admin');
        /* $query.=" WHERE nom_emp like '{$filtro}%'"; */
        if ($Empresa == 'true' && $Trabajador == 'true') {
            $empresaquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_empresa on tbl_empresa.id_usuario=tbl_usuarios.id WHERE nom_emp like '{$filtro}%'";   
            $empresa=DB::select($empresaquery);
            $trabajadorquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_trabajador on tbl_trabajador.id_usuario=tbl_usuarios.id WHERE nombre like '{$filtro}%'";
            $trabajador=DB::select($trabajadorquery);
            return response()->json(array(
                'empresa' => $empresa,
                'trabajador' => $trabajador,
    
            ));
        } else if ($Empresa == 'true'){
            $empresaquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_empresa on tbl_empresa.id_usuario=tbl_usuarios.id WHERE nom_emp like '{$filtro}%'";   
            $empresa=DB::select($empresaquery);
            return response()->json(array(
                'empresa' => $empresa,
                'resultado' => 'No has elegido trabajador',
    
            ));
        } else if ($Trabajador == 'true'){
            $trabajadorquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_trabajador on tbl_trabajador.id_usuario=tbl_usuarios.id WHERE nombre like '{$filtro}%'";
            $trabajador=DB::select($trabajadorquery);
            return response()->json(array(
                'trabajador' => $trabajador,
                'resultado' => 'No has elegido empresa',
            ));
        } else if ($Admin == 'true'){
            $adminquery="SELECT * FROM tbl_usuarios where id_perfil='1' AND nombre like '{$filtro}%'";
            $admin=DB::select($adminquery);
            return response()->json(array(
                'trabajador' => $admin,
                'resultado' => 'No has elegido empresa',
            ));
        } else{
            return response()->json(array(
                'resultado' => 'No has elegido nada',
    
            ));
        }
    }

    public function estadouser($id) {
        $datos=DB::select("SELECT estado FROM tbl_usuarios
        WHERE id = ?",[$id]);
        DB::beginTransaction();
        try{
            if ($datos[0]->estado == 1){
                DB::select("UPDATE tbl_usuarios SET estado = '0'
                WHERE id = ?",[$id]);
            }else{
                DB::select("UPDATE tbl_usuarios SET estado = '1'
                WHERE id = ?",[$id]);
            }
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }   catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
        }
    }

    public function perfiles(Request $req) {
        $datos=DB::select("SELECT * FROM tbl_perfiles");
        return response()->json($datos);
    }

    public function crear(Request $req) {
        DB::beginTransaction();
        try {
            DB::select("INSERT INTO tbl_usuarios (`mail`, `contra`, `id_perfil`, `estado`)
            VALUES (?, ?, ?, '1')",[$req['mail'],md5($req['contra']),$req['id_perfil']]);
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }   catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> $e->getMessage()));
        }
    }


}