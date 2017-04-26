<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class reporteDetalladopyController extends Controller
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
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->where('email', '=', $correo)->groupBy('Nombre_proyecto')->get();
              break;
          case 'ADMSUR':
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->where('Nombre_operacion', '=', 'Oficinas Sureste y Caribe')->groupBy('Nombre_proyecto')->get();
              break;
          case 'Admin':
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->groupBy('Nombre_proyecto')->get();
              break;
          case 'Programador':
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->groupBy('Nombre_proyecto')->get();
              break;
          case 'Direccion':
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->groupBy('Nombre_proyecto')->get();
              break;
          case 'ADMCENTRO':
              $cargat = DB::table('equipo_hotel')->distinct()->select('Nombre_proyecto')->where('Nombre_operacion', '=', 'Oficinas Centro y Norte')->groupBy('Nombre_proyecto')->get();
              break;
        }
        return view('reporte.reporteDetalladoproyecto', compact('cargat'));
    }
    public function getData(Request $request) {
        $Vproyecto= $request->input('proyecto');
        $resultClient = DB::table('equipo_hotel')->select([
            'Nombre_hotel',
            'Direccion',
            'Pais',
            'Estado',
            'Vertical',
            'Nombre',
            'Apellido',
            'Nombre_proyecto',
            'Nombre_operacion',
            'Nombre_servicio',
        ])->where('Nombre_proyecto', '=', $Vproyecto)->first();
        return json_encode($resultClient);
    }
    public function getImgData(Request $request){
      $ImgHotel= $request->input('imgrf');
      $resultImg = DB::table('ListarImagenProyecto')->select('Imagen')->where('Nombre_proyecto', '=', $ImgHotel)->get();
      return json_encode($resultImg);
    }

    public function gettableData(Request $request){
      $Vcliente2= $request->input('hotel');
      $resultClient = DB::table('estados_x_equipos')->select([
            'Nombre_hotel',
            'AP_Stock',
            'AP_Prestamo',
            'AP_Venta',
            'AP_Renta',
            'AP_Demo',
            'AP_Cambio',
            'SW_Rent',
            'ZD_Venta',
            'ZD_Renta',
            'ZD_Demo',
            'SW_Stock',
            'SW_Prestamo',
            'SW_Demo',
            'SW_Venta',
        ])->where('Nombre_proyecto', '=', $Vcliente2)->first();
        return json_encode($resultClient);
    }

    //Table One
    public function gettableDataOne(Request $request)
    {
      $Vcliente2= $request->input('proyecto');
      $resultClient = DB::table('estados_x_equipos')->select(
        'Nombre_hotel','AP_Stock','AP_Prestamo','AP_Venta','AP_Renta','AP_Demo','AP_Cambio','SW_Rent'
        )->where('Nombre_proyecto', '=', $Vcliente2)->get();
      return json_encode($resultClient);
    }
    //Table Two
    public function gettableDataTwo(Request $request)
    {
      $Vcliente2= $request->input('proyecto');
      $resultClient = DB::table('estados_x_equipos')->select(
        'Nombre_hotel','ZD_Venta','ZD_Renta','ZD_Demo',
        'SW_Stock','SW_Prestamo','SW_Demo','SW_Venta'
        )->where('Nombre_proyecto', '=', $Vcliente2)->get();
      return json_encode($resultClient);
    }
    public function getgraficbarData(Request $request)
    {
      $hotel_text = $request->input('proyecto');
      $result = DB::table('equipo_hotel')->select(DB::raw('Equipo, COUNT(Equipo) as Cantidad'))
        ->where('Nombre_proyecto', '=', $hotel_text)
        ->groupBy('Equipo')->get();

      return json_encode($result);
    }

    public function valuegetgraficbarData(Request $request)
    {
      $hotel_text = $request->input('proyecto');
      $result = DB::table('equipos_x_vertical')->select('Nombre_hotel','AP','SW','ZD','Sonda','CCTV','SonicWall')
        ->where('Nombre_proyecto', '=', $hotel_text)
        ->get();

      return json_encode($result);
    }

    public function getgraficlinData(Request $request)
    {
      $hotel_text = $request->input('proyecto');
      $result = DB::table('equipo_hotel')->select((DB::raw('Modelo, COUNT(Modelo) as Cantidad')),'Equipo')
        ->where('Nombre_proyecto', '=', $hotel_text)
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
