<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    //Zona Administrador
    public function vistaAdmin() {
        return view("admin");
    }

    public function leer(Request $req) {
        $filcorreo = $req->input('filcorreo');
        $filtro = $req->input('filtro');
        $Empresa = $req->input('Empresa');
        $Trabajador = $req->input('Trabajador');
        $Admin = $req->input('Admin');
        /* $query.=" WHERE nom_emp like '{$filtro}%'"; */
        $datos=array('res' => 'OK');
        if ($Empresa == 'true'){
            $empresaquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_empresa on tbl_empresa.id_usuario=tbl_usuarios.id WHERE mail like '{$filcorreo}%' and nom_emp like '{$filtro}%'";   
            $empresa=DB::select($empresaquery);
            $datos+=array('empresa' => $empresa);
        }
        if ($Trabajador == 'true'){
            $trabajadorquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_trabajador on tbl_trabajador.id_usuario=tbl_usuarios.id WHERE mail like '{$filcorreo}%' and nombre like '{$filtro}%'";
            $trabajador=DB::select($trabajadorquery);
            $datos+=array('trabajador' => $trabajador);
        }
        if ($Admin == 'true'){
            $adminquery="SELECT * FROM tbl_usuarios WHERE mail like '{$filcorreo}%' and id_perfil='1'";
            $admin=DB::select($adminquery);
            $datos+=array('admin' => $admin);
        }
        return response()->json($datos);
    }

    public function perfiles() {
        $datos=DB::select("SELECT * FROM tbl_perfiles");
        return response()->json($datos);
    }

    public function crearuser(Request $req) {
        DB::beginTransaction();
        //añadir logo empresa
        if($req->hasFile('logo_emp')){
            $logo_emp = $req->file('logo_emp')->store('logo','public');
        }else{
            $logo_emp = NULL;
        }
        //añadir foto trabajador
        if($req->hasFile('foto_perfil')){
            $foto_perfil = $req->file('foto_perfil')->store('foto','public');
        }else{
            $foto_perfil = NULL;
        }
        try {
            $id=DB::table('tbl_usuarios')->insertGetId(["mail"=>$req['mail'],"contra"=>md5($req['contra']),"id_perfil"=>$req['id_perfil'],"estado"=>'1']);
            if ($req['id_perfil'] == 2) {
                $id=DB::table('tbl_trabajador')->insert(["id_usuario"=>$id,"nombre"=>$req['nombre'],"apellido"=>$req['apellido'],"foto_perfil"=>$foto_perfil,"campo_user"=>$req['campo_user'],"experiencia"=>$req['experiencia'],"estudios"=>$req['estudios'],"idiomas"=>$req['idiomas'],"disponibilidad"=>$req['disponibilidad'],"about_user"=>$req['about_user'],"mostrado"=>'1']);
            }
            if ($req['id_perfil'] == 3) {
                $id=DB::table('tbl_empresa')->insert(["id_usuario"=>$id,"nom_emp"=>$req['nom_emp'],"loc_emp"=>$req['loc_emp'],"about_emp"=>$req['about_emp'],"campo_emp"=>$req['campo_emp'],"searching"=>$req['searching'],"mostrado"=>'1',"logo_emp"=>$logo_emp]);
            }
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }   catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> $e->getMessage()));
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

    public function mostrarmodaluser($id, $id_perfil) {
        DB::beginTransaction();
        try{
            $datos=array('res' => 'OK');
            $usuarios = DB::table('tbl_usuarios')->where('id','=',$id)->first();
            $datos+=array('usuarios' => $usuarios);
            if ($id_perfil == 2){
                $trabajador = DB::table('tbl_trabajador')->where('id_usuario','=',$id)->first();
                $datos+=array('trabajador' => $trabajador);
            }
            if ($id_perfil == 3){
                $empresa = DB::table('tbl_empresa')->where('id_usuario','=',$id)->first();
                $datos+=array('empresa' => $empresa);
            }
            DB::commit();
            return response()->json($datos);
        }   catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
        }
    }

    public function modificaruser(Request $req, $id, $id_perfil) {
        DB::beginTransaction();
        try{
            $datos=array('res' => 'OK');
            if ($id_perfil == 2){
                if ($req->hasFile('foto_perfil')) {
                    $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$id)->first();
                    if ($foto->foto_perfil != null) {
                        Storage::delete('public/'.$foto->foto_perfil);
                    }
                    $foto_perfil = $req->file('foto_perfil')->store('foto','public');
                }else{
                    $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$id)->first();
                    $foto_perfil = $foto->foto_perfil;
                }
                DB::table('tbl_trabajador')->where('id_usuario','=',$id)->update(["nombre"=>$req['nombre'],"apellido"=>$req['apellido'],"foto_perfil"=>$foto_perfil,"campo_user"=>$req['campo_user'],"experiencia"=>$req['experiencia'],"estudios"=>$req['estudios'],"idiomas"=>$req['idiomas'],"disponibilidad"=>$req['disponibilidad'],"about_user"=>$req['about_user'],"mostrado"=>$req['mostrado']]);
            }
            if ($id_perfil == 3){
                if ($req->hasFile('logo_emp')) {
                    $logo = DB::table('tbl_empresa')->select('logo_emp')->where('id_usuario','=',$id)->first();
                    if ($logo->logo_emp != null) {
                        Storage::delete('public/'.$logo->logo_emp);
                    }
                    $logo_emp = $req->file('logo_emp')->store('logo','public');
                }else{
                    $logo = DB::table('tbl_empresa')->select('logo_emp')->where('id_usuario','=',$id)->first();
                    $logo_emp = $logo->logo_emp;
                }
                DB::table('tbl_empresa')->where('id_usuario','=',$id)->update(["nom_emp"=>$req['nom_emp'],"loc_emp"=>$req['loc_emp'],"about_emp"=>$req['about_emp'],"campo_emp"=>$req['campo_emp'],"searching"=>$req['searching'],"mostrado"=>$req['mostrado'],"logo_emp"=>$logo_emp]);
            }
            $uscontra = DB::table('tbl_usuarios')->where('id','=',$id)->select('contra')->first();
            if ($req['contra'] == $uscontra->contra){
                DB::table('tbl_usuarios')->where('id','=',$id)->update(["mail"=>$req['mail'],"contra"=>$req['contra'],"estado"=>$req['estado']]);
            } else{
                DB::table('tbl_usuarios')->where('id','=',$id)->update(["mail"=>$req['mail'],"contra"=>md5($req['contra']),"estado"=>$req['estado']]);
            }
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }   catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
        }
    }

    public function eliminaruser($id, $id_perfil) {
        try {
            DB::beginTransaction();
            if($id_perfil == 2){
                $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$id)->first();
                if ($foto->foto_perfil != null) {
                    Storage::delete('public/'.$foto->foto_perfil);
                }
                DB::table('tbl_trabajador')->where('id_usuario','=',$id)->delete();
            }
            if($id_perfil == 3){
                $logo = DB::table('tbl_empresa')->select('logo_emp')->where('id_usuario','=',$id)->first();
                if ($logo->logo_emp != null) {
                    Storage::delete('public/'.$logo->logo_emp);
                }
                DB::table('tbl_empresa')->where('id_usuario','=',$id)->delete();
            }
            DB::table('tbl_usuarios')->where('id','=',$id)->delete();
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
        }
    }
}