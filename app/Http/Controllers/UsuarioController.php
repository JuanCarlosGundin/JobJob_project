<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{

/*----------------------------------------LOGIN Y LOGOUT------------------------------------------------------------------------*/
    public function loginP(Request $request){
        $datos= $request->except('_token','_method');
        try{
        $user=DB::table("tbl_perfiles")->join('tbl_usuarios', 'tbl_perfiles.id', '=', 'tbl_usuarios.id_perfil')->where('mail','=',$datos['mail'])->where('contra','=',md5($datos['contra']))->first();
        if($user->verificado=='0'){
            return response()->json(array('resultado'=> 'no'));
        }
        if($user->nom_perfil=='Admin'){
           $request->session()->put('nombre_admin',$request->mail);
        //    return redirect('cPanelAdmin');
        return response()->json(array('resultado'=> 'admin'));
        }if($user->nom_perfil=='Trabajador'){
            $request->session()->put('nombre_trabajador',$request->mail);
            $datos=DB::select('select * from tbl_usuarios
            where mail like ?',[$request->mail]);
            $request->session()->put('id_user',$datos[0]->id);
            $request->session()->put('id_perfil',$datos[0]->id_perfil);
            //return $querytrabajador;
            // $request->session()->put('id_user',$querytrabajador);
            // return redirect('paginatrabajador');
            return response()->json(array('resultado'=> 'trabajador'));
        }
        if($user->nom_perfil=='Empresa'){
            $request->session()->put('nombre_empresa',$request->mail);
            $datos=DB::select('select * from tbl_usuarios
            where mail like ?',[$request->mail]);
            $request->session()->put('id_user',$datos[0]->id);
            $request->session()->put('id_perfil',$datos[0]->id_perfil);
            // return redirect('paginaempresa');
            return response()->json(array('resultado'=> 'empresa'));
        }
        return response()->json(array('resultado'=> 'mal'));
    }catch(\Exception $e){
        return response()->json(array('resultado'=> 'mal'));
    }   
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
        $comprobarmail=DB::select('select mail from tbl_usuarios where mail=? ',[$datos['mail']]);
        if (count($comprobarmail)>0){
            return response()->json(array('resultado'=> 'mal'));
        }else{
        //añadir foto trabajador
        $path=$request->file('foto_perfil')->store('uploads','public');
        /*insertar datos en la base de datos*/
        $metertablausuario=DB::table('tbl_usuarios')->insertGetId(["mail"=>$datos['mail'],"contra"=>md5($datos['contra']),"id_perfil"=>$datos['id_perfil'],"verificado"=>'0',"estado"=>'1']);
            DB::table('tbl_trabajador')->insert(["id_usuario"=>$metertablausuario,"nombre"=>$datos['nombre'],"apellido"=>$datos['apellido'],"foto_perfil"=>$path,"campo_user"=>$datos['campo_user'],"experiencia"=>$datos['experiencia'],"estudios"=>$datos['estudios'],"idiomas"=>$datos['idiomas'],"disponibilidad"=>$datos['disponibilidad'],"about_user"=>$datos['about_user'],"mostrado"=>$datos['mostrado'],"loc_trabajador"=>$datos['loc_trabajador'],"edad"=>$datos['edad']]);
        Mail::raw('Entra a este link para validar tu cuenta de Job Job y acceder a nuestro servicio : (verificar)', function ($message) use($metertablausuario) {
            $id2=$metertablausuario;
            $usuario=DB::select('select * from tbl_usuarios 
            inner join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
            where tbl_usuarios.id=? ',[$id2]);
            $message->to($usuario[0]->{'mail'})
              ->subject('Link Para validar tu cuenta de Job Job');
          });
        return response()->json(array('resultado'=> 'OK'));
    
        }
    
    }catch(\Exception $e){
        return response()->json($e->getMessage());
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
        $comprobarmail=DB::select('select mail from tbl_usuarios where mail=? ',[$datos['mail']]);
        if (count($comprobarmail)>0){
            return response()->json(array('resultado'=> 'mal'));
        }else{
        //añadir foto empresa
        $path=$request->file('logo_emp')->store('uploads','public');
        /*insertar datos en la base de datos*/
        $metertablausuario=DB::table('tbl_usuarios')->insertGetId(["mail"=>$datos['mail'],"contra"=>md5($datos['contra']),"id_perfil"=>$datos['id_perfil'],"verificado"=>'0',"estado"=>'1']);
        $metertablaempresa=DB::table('tbl_empresa')->insert(["id_usuario"=>$metertablausuario,"nom_emp"=>$datos['nom_emp'],"loc_emp"=>$datos['loc_emp'],"about_emp"=>$datos['about_emp'],"campo_emp"=>$datos['campo_emp'],"searching"=>$datos['searching'],"mostrado"=>$datos['mostrado'],"vacante"=>$datos['vacante'],"logo_emp"=>$path]);
        Mail::raw('Entra a este link para validar tu cuenta de Job Job y acceder a nuestro servicio : (verificar)', function ($message) use($metertablausuario) {
            $id2=$metertablausuario;
            $usuario=DB::select('select * from tbl_usuarios 
            inner join tbl_empresa on tbl_usuarios.id=tbl_empresa.id_usuario
            where tbl_usuarios.id=? ',[$id2]);
            $message->to($usuario[0]->{'mail'})
              ->subject('Link Para validar tu cuenta de Job Job');
          });
        return response()->json(array('resultado'=> 'OK'));
        }
        // return redirect('login');
    }catch(\Exception $e){
        return response()->json($e->getMessage());
    }
}
/*----------------------------------------FIN REGISTRAR EMPRESA---------------------------------------------------------------------------------*/
/*----------------------------------------LEER TRABAJADOR--------------------------------------------------------------------------*/
public function leertrabajadorController(Request $request){
    $datos=DB::select('SELECT * FROM `tbl_ubicacion` INNER JOIN `tbl_tipo` ON tbl_ubicacion.id_tipo = tbl_tipo.id_tipo where nombre_ubicacion like ?',['%'.$request->input('filtro').'%']);
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
/*----------------------------------------ACTIVAR CUENTA DE USUARIO--------------------------------------------------------------------*/
public function ActivateACC(Request $request)
    {   
        $usuario = $request->input('user');
        $contra = $request->input('contra');
        try{
            $user=DB::table("tbl_usuarios")->where('mail','=',$usuario)->where('contra','=',md5($contra))->first();
            //return response()->json($user->id);
            //AQUI VA LA FUNCIÓN DEL LOGIN PARA COMPROBAR CONTRASEÑA
            //si la contraseña es correcta ejecuta esta función de abajo y nos indica que estamos verificados
            DB::update('update tbl_usuarios set verificado = 1 where id=?',[$user->id]);
              return response()->json("OK");
        }catch(\Throwable $th){
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
/*-------------------------------------FIN ACTIVAR CUENTA DE USUARIO--------------------------------------------------------------------*/

}


