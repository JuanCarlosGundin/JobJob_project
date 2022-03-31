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
        $Trabajador = $req->input('Trabajador');
        $Empresa = $req->input('Empresa');
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
    
            ));
        } else if ($Trabajador == 'true'){
            $trabajadorquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_trabajador on tbl_trabajador.id_usuario=tbl_usuarios.id WHERE nombre like '{$filtro}%'";
            $trabajador=DB::select($trabajadorquery);
            return response()->json(array(
                'trabajador' => $trabajador,
    
            ));
        } else{
            return response()->json(array(
                'resultado' => 'No has elegido cruck',
    
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


}