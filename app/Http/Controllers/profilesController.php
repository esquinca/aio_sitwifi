<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\RedirectResponse;

use DB;

use Auth;

use Image;

use File;

use Location;

class profilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.profiles');
    }
    public function profile(){
      $position = Location::get();
      $cityIP = $position-> cityName;
      $regioIP= $position-> regionName;
      $abrecode= $position-> countryCode;
      $paiscode= $position-> countryName;
      $concatenarIPdatos= $cityIP.', '.$regioIP.', '.$abrecode;
      //var_dump ($position);

      return view('profile.profiles', array('user' => Auth::user(), 'LocationIP'=>$concatenarIPdatos) );
    }
    public function data_user(Request $request)
    {
        $correo = Auth::user()->email;
        $resultClient = DB::table('timeline')->where('email', '=', $correo)->get();
        return json_encode($resultClient);
    }
    public function update_avatar(Request $request){
        $correo = Auth::user()->email;
        if($request->hasFile('avatar')){
            $user = Auth::user();
            if ($user->avatar !== 'default.jpg') {
                $file = public_path('img/avatars/' . $user->avatar);
                if (File::exists($file)) {  unlink($file);  }
            }
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/img/avatars/' . $filename ) );
            $updates = DB::table('itconcierges')->where('email', '=', $correo)
            ->update(['avatar' => $filename]);
        }
        //notificationMsg('imagenperf', 'Imagen actualizada.!!');
        return redirect('/profile');
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
      $fullname= $request->inputNamefull;
      //echo $fullname;
      //echo '<br>';
      $fullapellido= $request->inputapellido;

      $email= $request->inputEmail;
      //echo $email;
      //echo '<br>';
      $dateingre= $request->inputdateing;
      //echo $dateingre;
      //echo '<br>';
      $datenaci= $request->inputdatenac;
      $separard2 = explode ( '-', $datenaci);
      $diaNa=$separard2[2];
      $mesNa=$separard2[1];
      $anoNa=$separard2[0];

      //echo $separard2[0];
      //echo '<br>';
      //echo $separard2[1];
      //echo '<br>';
      //echo $separard2[2];
      //echo '<br>';
      $grado= $request->inputgradoest;
      //echo $grado;



      $sql = DB::table('itconcierges')->where('email', '=', $email)
      ->update(
          [ 'Nombre' => $fullname,
            'Apellido' => $fullapellido,
            'dia' => $diaNa,
            'mes' => $mesNa,
            'yearing' => $anoNa,
            'date_ingreso' => $dateingre,
            'Carrera' => $grado]
      );
      notificationMsg('success', 'Información actualizada.!!');
      return Redirect::back();

    }
    
    public function updatetwo(Request $request){
      $contrasenaNew = $request->inputnpass;
      $correo = $request->inputEmailcorreo;
      $passwordcifrar = bcrypt($contrasenaNew);

      $now = date("Y-m-d H:i:s");
      
      $sql = DB::table('itconcierges')->where('email', '=', $correo)
      ->update(
          [ 'password' => $passwordcifrar ]
      );

      auth()->logout();
      return redirect('logout');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
