<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

class UsuarioController extends Controller
{
    ///ZONA ADMINISTRADOR
    public function vistaAdmin() {
        return view('cPanelAdmin');
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
            /* $idadmin = session()->get('id_user');
            $datos+=array('idadmin' => $idadmin); */
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
            $id=DB::table('tbl_usuarios')->insertGetId(["mail"=>$req['mail'],"contra"=>md5($req['contra']),"id_perfil"=>$req['id_perfil'],"estado"=>'1',"verificado"=>'1']);
            /* ademas que sean trabajadores */
            if ($req['id_perfil'] == 2) {
                $id=DB::table('tbl_trabajador')->insert(["id_usuario"=>$id,"nombre"=>$req['nombre'],"apellido"=>$req['apellido'],"foto_perfil"=>$foto_perfil,"campo_user"=>$req['campo_user'],"experiencia"=>$req['experiencia'],"estudios"=>$req['estudios'],"idiomas"=>$req['idiomas'],"disponibilidad"=>$req['disponibilidad'],"about_user"=>$req['about_user'],"loc_trabajador"=>$req['loc_trabajador'],"edad"=>$req['edad'],"mostrado"=>'1']);
            }
            /* o que sean empresas */
            if ($req['id_perfil'] == 3) {
                $id=DB::table('tbl_empresa')->insert(["id_usuario"=>$id,"nom_emp"=>$req['nom_emp'],"loc_emp"=>$req['loc_emp'],"about_emp"=>$req['about_emp'],"campo_emp"=>$req['campo_emp'],"searching"=>$req['searching'],"vacante"=>$req['vacante'],"mostrado"=>'1',"logo_emp"=>$logo_emp]);
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
                DB::table('tbl_trabajador')->where('id_usuario','=',$id)->update(["nombre"=>$req['nombre'],"apellido"=>$req['apellido'],"foto_perfil"=>$foto_perfil,"campo_user"=>$req['campo_user'],"experiencia"=>$req['experiencia'],"estudios"=>$req['estudios'],"idiomas"=>$req['idiomas'],"disponibilidad"=>$req['disponibilidad'],"about_user"=>$req['about_user'],"loc_trabajador"=>$req['loc_trabajador'],"edad"=>$req['edad'],"mostrado"=>$req['mostrado']]);
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
                DB::table('tbl_empresa')->where('id_usuario','=',$id)->update(["nom_emp"=>$req['nom_emp'],"loc_emp"=>$req['loc_emp'],"about_emp"=>$req['about_emp'],"campo_emp"=>$req['campo_emp'],"searching"=>$req['searching'],"vacante"=>$req['vacante'],"mostrado"=>$req['mostrado'],"logo_emp"=>$logo_emp]);
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
           return redirect('cPanelAdmin');
        }if($user->nom_perfil=='Trabajador'){
            $request->session()->put('nombre_trabajador',$request->mail);
            $datos=DB::select('select * from tbl_usuarios
            where mail like ?',[$request->mail]);
            $request->session()->put('id_user',$datos[0]->id);
            $request->session()->put('id_perfil',$datos[0]->id_perfil);
            //return $querytrabajador;
            // $request->session()->put('id_user',$querytrabajador);
            return redirect('paginatrabajador');
        }
        if($user->nom_perfil=='Empresa'){
            $request->session()->put('nombre_empresa',$request->mail);
            $datos=DB::select('select * from tbl_usuarios
            where mail like ?',[$request->mail]);
            $request->session()->put('id_user',$datos[0]->id);
            $request->session()->put('id_perfil',$datos[0]->id_perfil);
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
    /*----------------------------------------REGISTRAR TRABAJADOR---------------------------------------------------------------------------------*/
    // public function registro()
    // {
    //     return view('registrar');//este es el de prueba luego se tendrá que cambiar a registrar
    // }
    
    public function registroPost(Request $request){
        $datos = $request->except('_token');
        try{
            DB::beginTransaction();
            //añadir foto trabajador
            $path=$request->file('foto_perfil')->store('uploads','public');
            /*insertar datos en la base de datos*/
            $metertablausuario=DB::table('tbl_usuarios')->insertGetId(["mail"=>$datos['mail'],"contra"=>md5($datos['contra']),"id_perfil"=>$datos['id_perfil']]); 
            // $selectidusuario = DB::table('tbl_usuarios')->select('id')->where('id','=',$metertablausuario)->first();
            // $selectidusuario=$selectidusuario->id;
            $metertablatrabajador=DB::table('tbl_trabajador')->insert(["id_usuario"=>$metertablausuario,"nombre"=>$datos['nombre'],"apellido"=>$datos['apellido'],"foto_perfil"=>$path,"campo_user"=>$datos['campo_user'],"experiencia"=>$datos['experiencia'],"estudios"=>$datos['estudios'],"idiomas"=>$datos['idiomas'],"disponibilidad"=>$datos['disponibilidad'],"about_user"=>$datos['about_user'],"mostrado"=>$datos['mostrado']]);
            
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
            // return redirect('login');
            
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }
    /*----------------------------------------FIN REGISTRAR TRABAJADOR---------------------------------------------------------------------------------*/


    /*----------------------------------------REGISTRAR EMPRESA---------------------------------------------------------------------------------*/
    // public function registroEmpresa()
    // {
    //     return view('pruebaregistrarempresa');//este es el de prueba luego se tendrá que cambiar a registrar
    // }

    public function registroEmpresaPost(Request $request){
        $datos = $request->except('_token');
        try{
            DB::beginTransaction();
            //añadir foto empresa
            $path=$request->file('logo_emp')->store('uploads','public');
            /*insertar datos en la base de datos*/
            $metertablausuario=DB::table('tbl_usuarios')->insertGetId(["mail"=>$datos['mail'],"contra"=>md5($datos['contra']),"id_perfil"=>$datos['id_perfil']]); 
            // $selectidusuario = DB::table('tbl_usuarios')->select('id')->where('id','=',$metertablausuario)->first();
            // $selectidusuario=$selectidusuario->id;
            $metertablaempresa=DB::table('tbl_empresa')->insert(["id_usuario"=>$metertablausuario,"nom_emp"=>$datos['nom_emp'],"loc_emp"=>$datos['loc_emp'],"about_emp"=>$datos['about_emp'],"campo_emp"=>$datos['campo_emp'],"searching"=>$datos['searching'],"mostrado"=>$datos['mostrado'],"logo_emp"=>$path]);
            DB::commit();
            return response()->json(array('resultado'=> 'OK'));
            // return redirect('login');
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }
    /*----------------------------------------FIN REGISTRAR EMPRESA---------------------------------------------------------------------------------*/
    /*----------------------------------------LEER TRABAJADOR--------------------------------------------------------------------------*/

    public function leertrabajadorController(Request $request){

        $var =session()->get('id_user');
        $datos=DB::select('SELECT * FROM `tbl_trabajador` INNER JOIN `tbl_usuarios` ON tbl_trabajador.id_usuario = tbl_usuarios.id WHERE tbl_usuarios.id=?',[$var]);
        return response()->json($datos);
    }
    /*----------------------------------------FIN LEER TRABAJADOR--------------------------------------------------------------------------*/

    /*----------------------------------------MODIFICAR TRABAJADOR---------------------------------------------------------------------*/
    public function modificartrabajadorController(Request $request){
        $datos=$request->except('_token','_method');
        if ($request->hasFile('foto_perfil')) {
            $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$request['id_usuario'])->first();
            if ($foto->foto_perfil != null) {
                Storage::delete('public/'.$foto->foto_perfil);
            }
            $datos['foto_perfil'] = $request->file('foto_perfil')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$request['id_usuario'])->first();
            $datos['foto_perfil'] = $foto->foto_perfil;
        }
        try {
            DB::beginTransaction();
            $path=$request->file('foto_perfil')->store('uploads','public');
            DB::update('update tbl_ubicacion set nombre_ubicacion = ?, descripcion_ubicacion = ?, direccion_ubicacion = ?, foto_ubicacion = ? where id_ubicacion = ?', [$request->input('nombre_ubicacion'),$request->input('descripcion_ubicacion'),$request->input('direccion_ubicacion'),$path,$request->input('id_ubicacion')]);
            DB::commit();
            return response()->json(array('resultado'=> 'OK')); 
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        } 
    }
    /*----------------------------------------FIN MODIFICAR TRABAJADOR---------------------------------------------------------------------*/

    ///ZONA NOTIFICACIONES
    public function vistaNotificaciones() {
        return view("notificaciones");
    }

    //leernotificaciones
    public function leernotificaciones(Request $req) {
        $id=session()->get('id_user');
        $id_perfil=session()->get('id_perfil');
        //si el cliente es trabajador, mira ofertas de empresas
        if($id_perfil==2){
            try {
                DB::beginTransaction();
                $empresas=DB::select('select * from tbl_usuarios
                inner join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
                inner join tbl_empresa on tbl_interaccion.id_iniciador=tbl_empresa.id_usuario
                where tbl_empresa.nom_emp like ? and tbl_interaccion.id_interactuado = ? and tbl_interaccion.tipo_interaccion <> 2',[$req['filter']."%",$id]);
                DB::commit();
                return response()->json(array('empresas'=> $empresas));
            } catch (\Exception $e) {
                return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
            }
        }else{
            //si el cliente es empresa, mira ofertas de trabajador
            try {
                DB::beginTransaction();
                $trabajadores=DB::select('select * from tbl_usuarios
                inner join tbl_interaccion on tbl_usuarios.id=tbl_interaccion.id_interactuado
                inner join tbl_trabajador on tbl_interaccion.id_iniciador=tbl_trabajador.id_usuario
                where tbl_trabajador.nombre like ?  and tbl_interaccion.id_interactuado = ? and tbl_interaccion.tipo_interaccion <> 2',[$req['filter']."%",$id]);
                DB::commit();
                return response()->json(array('trabajadores'=> $trabajadores));
            } catch (\Exception $e) {
                return response()->json(array('resultado'=> 'NOK: '.$e->getMessage()));
            }
        }
    }



    ///ZONA NOTIFICACIONES
}
