<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SearchAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function searchSerieMac(Request $request)
     {
       $searchText = $request->input('search_text');

       $validation = explode("|", $searchText);

       $buscador = '%'.$validation[0].'%';

       if ($validation[1] === 'equipo') {
         $result = DB::table('equipo_hotel')->select([
           'Nombre_hotel',
           'Modelo',
           'MAC',
           'Serie',
           'Descripcion',
           'Nombre_estado',
           'Nombre_proyecto',
         ])->where('MAC', 'like', $buscador)
         ->orWhere('Serie', 'like', $buscador)
           ->get();

           return json_encode($result);
       }else{
       $result2 = DB::table('movimientos')
       ->select([
         'FechaMov',
         'Sujeto',
         'Motivo',
         'Equipo',
         'Serie',
         'MAC',
         'Descripcion',
         'OrigenHOTEL',
         'DestinoHOTEL',
         'Estado',
         'Proyecto'
       ])->where('MAC', 'like', $buscador)
       ->orWhere('Serie', 'like', $buscador)
       ->get();

       return json_encode($result2);
       }
     }
    public function index()
    {
        //
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
