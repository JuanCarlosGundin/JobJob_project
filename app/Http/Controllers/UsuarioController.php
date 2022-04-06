<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;
use Illuminate\Http\Request;
use Session;

class UsuarioController extends Controller
{

/*----------------------------------------LOGIN Y LOGOUT------------------------------------------------------------------------*/
    public function loginP(Request $request){
        $datos= $request->except('_token','_method');
        $user=DB::table("tbl_perfiles")->join('tbl_usuarios', 'tbl_perfiles.id', '=', 'tbl_usuarios.id_perfil')->where('mail','=',$datos['mail'])->where('contra','=',md5($datos['contra']))->first();
        
        if($user->nom_perfil=='Admin'){
           $request->session()->put('nombre_admin',$request->mail);
           return redirect('cPanelAdmin');
        }
        if($user->nom_perfil=='Trabajador'){
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
    // if ($request->hasFile('foto_perfil')) {
    //     $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$request['id_usuario'])->first();
    //     if ($foto->foto_perfil != null) {
    //         Storage::delete('public/'.$foto->foto_perfil);
    //     }
    //     $datos['foto_perfil'] = $request->file('foto_perfil')->store('uploads','public');
    // }else{
    //     $foto = DB::table('tbl_trabajador')->select('foto_perfil')->where('id_usuario','=',$request['id_usuario'])->first();
    //     $datos['foto_perfil'] = $foto->foto_perfil;
    // }
    try {
        DB::beginTransaction();
        // $path=$request->file('foto_perfil')->store('uploads','public');
        DB::update('update tbl_trabajador set nombre = ?, apellido = ?, campo_user = ?, experiencia = ?, estudios = ?, idiomas = ?, disponibilidad = ?, about_user = ? where id_usuario = ?', [$request->input('nombre'),$request->input('apellido'),$request->input('campo_user'),$request->input('experiencia'),$request->input('estudios'),$request->input('idiomas'),$request->input('disponibilidad'),$request->input('about_user'),$request->input('id_usuario')]);
        DB::commit();
        return response()->json(array('resultado'=> 'OK')); 
    } catch (\Throwable $th) {
        return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
    } 
}
/*----------------------------------------FIN MODIFICAR TRABAJADOR---------------------------------------------------------------------*/


}
