<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class reporteDetalladoDistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('reporte.reporteDetalladodistribucion');
    }
    public function distribdata()
    {
      $result = DB::table('dsonda')->select(DB::raw('Nombre_Operacion, Cantidad'))->get();
      return json_encode($result);
    }
    public function distribgfc1()
    {
      $result = DB::table('dantenasxpais')->select(DB::raw('Pais, Cantidad'))->get();
      return json_encode($result);
    }
    public function distribgfc2()
    {
      $result = DB::table('dantenaxpaisvertical')->select(DB::raw('Pais, Cantidad, Vertical'))->get();
      return json_encode($result);
    }
    public function distribgfc3()
    {
      $result = DB::table('dpaisyestados')->select(DB::raw('Pais, Cantidad, Estado'))->get();
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
