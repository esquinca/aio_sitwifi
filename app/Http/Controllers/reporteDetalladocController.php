<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class reporteDetalladocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correo = Auth::user()->email;
        $priv = Auth::user()->Privilegio;
        switch ($priv) {
            case 'IT':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->where('email', '=', $correo)->groupBy('Nombre_hotel')->get();
                break;
            case 'ADMSUR':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->where('Nombre_operacion', '=', 'Oficinas Sureste y Caribe')->groupBy('Nombre_hotel')->get();
                break;
            case 'Direccion':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->groupBy('Nombre_hotel')->get();
                break;
            case 'Admin':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->groupBy('Nombre_hotel')->get();
                break;
            case 'Programador':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->groupBy('Nombre_hotel')->get();
                break;
            case 'ADMCENTRO':
                $cargaCarta = DB::table('equipo_hotel')->distinct()->select('Nombre_hotel')->where('Nombre_operacion', '=', 'Oficinas Centro y Norte')->groupBy('Nombre_hotel')->get();
                break;
        }
        return view('reporte.reporteDetalladocaratula', compact('cargaCarta'));
    }
    public function cartadata(Request $request)
   	{
   		$Vcliente= $request->input('cliente');
        $resultClient = DB::table('equipo_hotel')->select([
            'JefeNombre',
			'AreaTrabajo',
			'Telefono',
			'emailjefe',
			'Nombre_hotel',
			'Sistemas',
			'Pais',
			'Estado',
			'Direccion',
			'TelefonoSistemas',
			'CorreoSistemas',
			'Fecha_inicioP',
			'Fecha_terminoP'
        ])->where('Nombre_hotel', '=', $Vcliente)->first();
        return json_encode($resultClient);
   	}
   	public function cartagfc1(Request $request)
    {
      $hotel_text = $request->input('proyecto');
      $result = DB::table('equipo_hotel')->select(DB::raw('Equipo, COUNT(Equipo) as Cantidad'))
        ->where('Nombre_hotel', '=', $hotel_text)
        ->groupBy('Equipo')->get();

      return json_encode($result);
    }
   	public function cartagfc2(Request $request)
   	{
   		$hotel_text = $request->input('proyecto');
      $result = DB::table('equipo_hotel')->select((DB::raw('Modelo, COUNT(Modelo) as Cantidad')),'Equipo')
        ->where('Nombre_hotel', '=', $hotel_text)
        ->groupBy('Modelo')->get();

      return json_encode($result);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
