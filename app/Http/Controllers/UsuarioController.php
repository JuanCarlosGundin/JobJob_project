<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
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
        return redirect('/');
    }
    public function logout(Request $request){
        $request->session()->forget('Admin');
        $request->session()->forget('Trabajador');
        $request->session()->forget('Empresa');
        $request->session()->flush();
        return redirect('/');
    }
/*----------------------------------------FIN LOGIN Y LOGOUT------------------------------------------------------------------------*/

}
