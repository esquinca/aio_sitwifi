<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class SuresteGeneralController extends Controller
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
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->where('email', '=', $correo)
                 ->groupBy('Nombre_hotel')->get();
                 break;
             case 'ADMSUR':
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->where('Nombre_operacion', '=', 'Oficinas Sureste y Caribe')
                 ->groupBy('Nombre_hotel')->get();
                 break;
             case 'Direccion':
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->groupBy('Nombre_hotel')->get();
                 break;
             case 'Admin':
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->groupBy('Nombre_hotel')->get();
                 break;
             case 'Programador':
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->groupBy('Nombre_hotel')->get();
                 break;
             case 'ADMCENTRO':
                 $hoteles = DB::table('equipo_hotel')->select('Nombre_hotel')
                 ->where('Nombre_operacion', '=', 'Oficinas Centro y Norte')
                 ->groupBy('Nombre_hotel')->get();
                 break;
         }
         return view('operacion.sureste', compact('hoteles'));
    }

    public function getDatosHeader(Request $request)
    {
        $hotel_text = $request->input('hotel_text');
        $result = DB::table('equipo_hotel')->select([
            'Direccion',
            'Nombre_servicio',
            'Nombre_operacion',
            'Nombre_proyecto',
            'Nombre',
            'Apellido',
            'Vertical',
            'Pais',
            'Estado',
        ])->where('Nombre_hotel', '=', $hotel_text)->first();
        return json_encode($result);
    }

    public function getDatosHotel(Request $request)
    {
    	$hotel_text = $request->input('hotel_text');
    	$equipohotel = DB::table('equipo_hotel')->select([
    		'Equipo',
    		'MAC',
    		'Serie',
    		'Modelo',
    		'Descripcion',
    		'Nombre_estado',
    		'Nombre_servicio',
    	])->where('Nombre_hotel', '=', $hotel_text)->get();
    	return json_encode($equipohotel);
    }

    public function getImgUrl(Request $request)
    {
        $hotel_text = $request->input('hotel_text');
        $hotelURL = DB::table('hotels')->select('dirlogo1')
        ->where('Nombre_hotel', '=', $hotel_text)->get();

        return json_encode($hotelURL);
    }


    public function queryCantidadAntenas(Request $request)
    {
        $hotel_text = $request->input('hotel_text');
        $result = DB::table('equipo_hotel')->select(DB::raw('Modelo, COUNT(Modelo) as Cantidad'))
        ->where([
            ['Nombre_hotel', '=', $hotel_text],
            ['Equipo', '=', 'Antena'],
        ])->groupBy('Modelo')->get();
        return json_encode($result);
    }

    public function queryCantidadEquipo(Request $request)
    {
        $hotel_text = $request->input('hotel_text');
        $result = DB::table('equipo_hotel')->select(DB::raw('Equipo, COUNT(Equipo) as Cantidad'))
        ->where('Nombre_hotel', '=', $hotel_text)
        ->groupBy('Equipo')->get();
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
