<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    ///ZONA ADMINISTRADOR
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
        /* si se ha seleccionado admin en el checkbox */
        if ($Admin == 'true'){
            $adminquery="SELECT * FROM tbl_usuarios WHERE mail like '{$filcorreo}%' and id_perfil='1'";
            $admin=DB::select($adminquery);
            $datos+=array('admin' => $admin);
        }
        /* si se ha seleccionado trabajador en el checkbox */
        if ($Trabajador == 'true'){
            $trabajadorquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_trabajador on tbl_trabajador.id_usuario=tbl_usuarios.id WHERE mail like '{$filcorreo}%' and nombre like '{$filtro}%'";
            $trabajador=DB::select($trabajadorquery);
            $datos+=array('trabajador' => $trabajador);
        }
        /* si se ha seleccionado empresa en el checkbox */
        if ($Empresa == 'true'){
            $empresaquery="SELECT * FROM tbl_usuarios
            INNER JOIN tbl_empresa on tbl_empresa.id_usuario=tbl_usuarios.id WHERE mail like '{$filcorreo}%' and nom_emp like '{$filtro}%'";   
            $empresa=DB::select($empresaquery);
            $datos+=array('empresa' => $empresa);
        }
        return response()->json($datos);
    }
    //obtener perfiles
    public function perfiles() {
        $datos=DB::select("SELECT * FROM tbl_perfiles");
        return response()->json($datos);
    }

    public function crearuser(Request $req) {
        DB::beginTransaction();
        //añadir logo empresa si existe
        if($req->hasFile('logo_emp')){
            $logo_emp = $req->file('logo_emp')->store('logo','public');
        }else{
            $logo_emp = NULL;
        }
        //añadir foto trabajador si existe
        if($req->hasFile('foto_perfil')){
            $foto_perfil = $req->file('foto_perfil')->store('foto','public');
        }else{
            $foto_perfil = NULL;
        }
        try {
            /* insertar usuarios */
            $id=DB::table('tbl_usuarios')->insertGetId(["mail"=>$req['mail'],"contra"=>md5($req['contra']),"id_perfil"=>$req['id_perfil'],"estado"=>'1']);
            /* ademas que sean trabajadores */
            if ($req['id_perfil'] == 2) {
                $id=DB::table('tbl_trabajador')->insert(["id_usuario"=>$id,"nombre"=>$req['nombre'],"apellido"=>$req['apellido'],"foto_perfil"=>$foto_perfil,"campo_user"=>$req['campo_user'],"experiencia"=>$req['experiencia'],"estudios"=>$req['estudios'],"idiomas"=>$req['idiomas'],"disponibilidad"=>$req['disponibilidad'],"about_user"=>$req['about_user'],"mostrado"=>'1']);
            }
            /* o que sean empresas */
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
    //cambiamos el estado del usuario si queremos banearlo o restaurarlo
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
    //mostrar el contenido del modal al querer modificar un registro
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
            /* si es trabajador */
            if ($id_perfil == 2){
                /* si existe una foto */
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
            /* si es empresa */
            if ($id_perfil == 3){
                /* si existe un logo */
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
            /* si la contraseña la modificas, que tenga md5, si no que conserve valor */
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
            /* si es trabajador, se comprueba si tiene foto y se elimina todo */
            if($id_perfil == 2){
                $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$id)->first();
                if ($foto->foto_perfil != null) {
                    Storage::delete('public/'.$foto->foto_perfil);
                }
                DB::table('tbl_trabajador')->where('id_usuario','=',$id)->delete();
            }
            /* si es empresa, se comprueba si tiene logo y se elimina todo */
            if($id_perfil == 3){
                $logo = DB::table('tbl_empresa')->select('logo_emp')->where('id_usuario','=',$id)->first();
                if ($logo->logo_emp != null) {
                    Storage::delete('public/'.$logo->logo_emp);
                }
                DB::table('tbl_empresa')->where('id_usuario','=',$id)->delete();
            }
            /* se elimina al usuario */
            DB::table('tbl_usuarios')->where('id','=',$id)->delete();
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
        }
    }
    ///ZONA ADMINISTRADOR

    /*----------------------INDEX--------------------------------*/

    public function index(){
        return view ('index');
    }
    /*----------------------------------------LOGIN Y LOGOUT------------------------------------------------------------------------*/
    public function loginP(Request $request){
        $datos= $request->except('_token','_method');
        $user=DB::table("tbl_perfiles")->join('tbl_usuarios', 'tbl_perfiles.id', '=', 'tbl_usuarios.id_perfil')->where('mail','=',$datos['mail'])->where('contra','=',md5($datos['contra']))->first();

        if($user->nom_perfil=='Admin'){
           $request->session()->put('nombre_admin',$request->mail);
           $request->session()->put('administrador',$request->mail);
           return redirect('cPanelAdmin');
        }if($user->nom_perfil=='Trabajador'){
            $request->session()->put('nombre_trabajador',$request->mail);
            $request->session()->put('trabajador',$request->mail);
            return redirect('paginatrabajador');
        }
        if($user->nom_perfil=='Empresa'){
            $request->session()->put('nombre_empresa',$request->mail);
            $request->session()->put('empresa',$request->mail);
            return redirect('paginaempresa');
        }
        return redirect('login');
    }
    public function logout(Request $request){
        $request->session()->forget('Admin');
        $request->session()->forget('Trabajador');
        $request->session()->forget('Empresa');
        $request->session()->flush();
        return redirect('/');
    }
    /*----------------------------------------FIN LOGIN Y LOGOUT------------------------------------------------------------------------*/

    ///ZONA NOTIFICACIONES
    public function vistaNotificaciones() {
        return view("notificaciones");
    }

    //leernotificaciones
    public function leernotificaciones(Request $req) {
        $id=4;
        $perfil=2;
        //si el cliente es trabajador, mira ofertas de empresas
        if($perfil==2){
        $empresas=DB::select('select * from tbl_usuarios 
        left join tbl_empresa on tbl_usuarios.id=tbl_empresa.id_usuario
        left join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
        where tbl_usuarios.id_perfil=3 and nom_emp like ? and (tbl_interaccion.id_iniciador is null or (tbl_interaccion.id_iniciador <> ? and tbl_interaccion.tipo_interaccion <> 2 and tbl_interaccion.coincidencia like 0))',[$req['filter']."%",$id]);
        return response()->json(array('empresas'=> $empresas));
        }else{
            //si el cliente es empresa, mira ofertas de trabajador
        $trabajadores=DB::select('select * from tbl_usuarios 
        inner join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
        inner join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
        where tbl_usuarios.id_perfil=2 and nombre like ? and (tbl_interaccion.id_iniciador is null or (tbl_interaccion.id_iniciador <> ? and tbl_interaccion.tipo_interaccion <> 2 and tbl_interaccion.coincidencia like 0 ))',[$req['filter']."%",$id]);
        return response()->json(array('trabajadores'=> $trabajadores));
        }
    }

    ///ZONA NOTIFICACIONES
}
