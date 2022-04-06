<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Mail\TestMail;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class MailController extends Controller
{
    public function sending(Request $request)
    {   
        $mail = $request->input('mail');
        $perfil=3;
        try{
        if($perfil==2){
            Mail::raw($mail, function ($message) {
                //yo
                $id=2;
                //al que le envio
                $idotro=3;
                $usuario=DB::select('select * from tbl_usuarios 
                inner join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
                where tbl_usuarios.id_perfil=? ',[$id]);
                $usuar2=DB::select('select * from tbl_usuarios 
                inner join tbl_empresa on tbl_usuarios.id=tbl_empresa.id_usuario
                where tbl_usuarios.id_perfil=? ',[$idotro]);
                $message->to($usuar2[0]->{'mail'})
                  ->subject('Mensaje de '.$usuario[0]->{'nombre'}.' '.$usuario[0]->{'apellido'}.'');
              });
              return response()->json("OK");
        }else{
            Mail::raw($mail, function ($message) {
                $id=3;
                $idotro=40;
                $usuario=DB::select('select * from tbl_usuarios 
                inner join tbl_empresa on tbl_usuarios.id=tbl_empresa.id_usuario
                where tbl_usuarios.id_perfil=? ',[$id]);
                $usuar2=DB::select('select * from tbl_usuarios 
                inner join tbl_trabajador on tbl_usuarios.id=tbl_trabajador.id_usuario
                where tbl_usuarios.id_perfil=? ',[$idotro]);
                $message->to($usuar2[0]->{'mail'})
                  ->subject('Mensaje de la empresa '.$usuario[0]->{'nom_emp'}.'');
              });
              return response()->json("OK");
            }
        }catch(\Throwable $th){
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
}