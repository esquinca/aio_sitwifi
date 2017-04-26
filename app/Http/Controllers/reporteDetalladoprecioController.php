<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class reporteDetalladoprecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargaone = DB::table('hotel_proyecto')->distinct()->select('Nombre_hotel')->groupBy('Nombre_hotel')->get();
        return view('reporte.reporteDetalladoprecio', compact('cargaone'));
    }
    public function getData(Request $request) {
        $Vcliente= $request->input('cliente');
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
        ])->where('Nombre_hotel', '=', $Vcliente)->first();
        return json_encode($resultClient);
    }
    public function getImgData(Request $request){
      $ImgHotel= $request->input('imgrf');
      $resultImg = DB::table('ListarImagenProyecto')->select('Imagen')->where('Nombre_hotel', '=', $ImgHotel)->get();
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
            'AP_Garantia',
            'SW_Stock',
            'SW_Prestamo',
            'SW_Demo',
            'SW_Rent',
            'ZD_Venta',
            'ZD_Renta',
            'ZD_Demo',
        ])->where('Nombre_hotel', '=', $Vcliente2)->first();
        return json_encode($resultClient);
    }
    public function gettablepriceData(Request $request)
    {
      $hotel_name= $request->input('hotel');
      $resulttab = DB::table('Costos')->select(
        'Equipo','MAC','Serie','Modelo','Descripcion','Costo'
        )->where('Nombre_hotel', '=', $hotel_name)->get();
      return json_encode($resulttab);
    }
    public function getgraficbarData(Request $request)
    {
      $hotel_text = $request->input('hotel');
      $result = DB::table('equipo_hotel')->select(DB::raw('Equipo, COUNT(Equipo) as Cantidad'))
        ->where('Nombre_hotel', '=', $hotel_text)
        ->groupBy('Equipo')->get();

      return json_encode($result);
    }
    public function getgraficlinData(Request $request)
    {
      $hotel_text = $request->input('hotel');
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
