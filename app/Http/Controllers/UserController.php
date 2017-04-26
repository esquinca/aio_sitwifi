<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\RedirectResponse;

use DB;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $privilegios = DB::table('jefedirecto')->select('id', 'Nombre')->get();
      return view('user.add_user', compact('privilegios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
     {
         $name= $request->inputName;
         $lastname= $request->inputApellido;
         $mail= $request->inputEmail;
         $privilegio= $request->selectpriv;
         $jefedirect= $request->selectjefedir;
         $area= $request->inputarea;

         $password = bcrypt('123456');
         $imagen = 'default.jpg';
         $now = date("Y-m-d H:i:s");

         $sql = DB::table('itconcierges')->where('email', '=', $mail)->count();
         if ($sql == 0) {
           notificationMsg('success', 'Registrando.!!');
           $registro = DB::table('itconcierges')->insertGetId(
               ['Nombre' => $name,
                'Apellido' => $lastname,
                'Nickname' => $mail,
                'email' => $mail,
                'Privilegio' => $privilegio,
                'jefedirecto_id' => $jefedirect,
                'Area' => $area,
                'password' => $password,
                'avatar' => $imagen,
                'created_at' => $now,
                'updated_at' => $now]
           );
           return Redirect::back();
         }
         else {
           notificationMsg('danger', 'Este Correo electronico ya se encuentra Registro.!!');
           return Redirect::back();
         }
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show (Request $request)
      {
          $resultado= DB::table('timeline')->select(
            'id',
            'Nombre',
            'Apellido',
            'Privilegio',
            'email',
            'dia',
            'mes',
            'yearing',
            'puesto',
            'Carrera',
            'Area',
            'date_ingreso',
            'Jefe'
           )->orderBy('id', 'asc')->get();
          return json_encode($resultado);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function editar(Request $request)
     {
       $id= $request->sector;
       $result = DB::table('timeline')->select(
         'id',
         'Nombre',
         'Apellido',
         'Privilegio',
         'email',
         'dia',
         'mes',
         'yearing',
         'puesto',
         'Carrera',
         'Area',
         'date_ingreso',
         'id_jefe',
         'Jefe'
         )->where('id', '=', $id)->get();
       return json_encode($result);
       //return response()->json(['response' => 'This is get method']);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request)
     {
       $mail= $request->correo;
       $sql = DB::table('itconcierges')->where('email', '=', $mail)->count();
       return $sql;
     }
     public function editDos(Request $request)
     {
       $id= $request->sector;
       $mail= $request->correo;
       $sql = DB::table('itconcierges')->where('id', '=', $id)->where('email', '=', $mail)->count();
       return $sql;
     }
     public function update(Request $request)
     {
       $edita_id= $request->id_recibido;
       $edita_na= $request->inputEditName;
       $edita_ln= $request->inputEditLastName;
       $edita_em= $request->inputEditEmail;
       $edita_sp= $request->selectEditPriv;
       $edita_sj= $request->selectEditjefedir;
       $edita_ar= $request->inpuEditArea;

       $sql = DB::table('itconcierges')->where('id', '=', $edita_id)
       ->update(
           ['Nombre' => $edita_na,
            'Apellido' => $edita_ln,
            'Nickname' => $edita_em,
            'email' => $edita_em,
            'Privilegio' => $edita_sp,
            'jefedirecto_id' => $edita_sj,
            'Area' => $edita_ar]
       );

       notificationMsg('success', 'Registro Actualizado!!');
       return Redirect::back();
     }

     public function destroyconsult(Request $request)
     {
        $id= $request->sector;
        $email_admin_actual= $request->sectore;
        list($sql_one)= DB::table('itconcierges')->select('id')->where('email', '=', $email_admin_actual)->get('id');
        return $sql_one->id;
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
      $id= $request->sectordos;
      $yes='1';
      DB::table('itconcierges')->where('id', '=', $id)->delete();

      $sql = DB::table('social_providers_one')->where('user_id', '=', $id)->count();
      if($sql != 0){
        DB::table('social_providers_one')->where('user_id', '=', $id)->delete();
      }
      return $yes;
    }
}
