<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
	return View::make('auth.login');
});

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


Route::group(['middleware' => ['auth']], function() {
   	Route::get('/', function() {
	 		return view('home');
	 	});
		/*Registros del Reporte detalles Sin costos*/
		Route::get('/reporte_detallado', 'reporteDetalladoController@index');
		Route::get('/ajax-selectclientes', 'reporteDetalladoController@getDatosSelect');
		Route::get('/ajax-detalle-uno', 'reporteDetalladoController@getData');
		Route::get('/ajax-desglose-cant', 'reporteDetalladoController@gettableData');
		Route::get('/ajax-img', 'reporteDetalladoController@getImgData');
		Route::get('/ajax-content-bar-det', 'reporteDetalladoController@getgraficbarData');
		Route::get('/ajax-content-lin-det', 'reporteDetalladoController@getgraficlinData');
		Route::get('/ajax-content-tDet', 'reporteDetalladoController@gettablecData');

		/*Registro de precios*/
		Route::get('/reporte_detalladop', 'reporteDetalladoprecioController@index');
		Route::get('/ajax-data-precio', 'reporteDetalladoprecioController@getData');
		Route::get('/ajax-data-img-precio', 'reporteDetalladoprecioController@getImgData');
		Route::get('/ajax-desglose-cant-precio', 'reporteDetalladoprecioController@gettableData');
		Route::get('/ajax-content-tP', 'reporteDetalladoprecioController@gettablepriceData');
		Route::get('/ajax-content-bar', 'reporteDetalladoprecioController@getgraficbarData');
		Route::get('/ajax-content-lin', 'reporteDetalladoprecioController@getgraficlinData');

		/*Registro de proyectos*/
		Route::get('/reporte_detalladopy', 'reporteDetalladopyController@index');
		Route::get('/ajax-data-proyecto', 'reporteDetalladopyController@getData');
		Route::get('/ajax-data-img-proy', 'reporteDetalladopyController@getImgData');
		Route::get('/ajax-num-equip-proy', 'reporteDetalladopyController@valuegetgraficbarData');
		Route::get('/ajax-desg-tableO-proy', 'reporteDetalladopyController@gettableDataOne');
		Route::get('/ajax-desg-tableT-proy', 'reporteDetalladopyController@gettableDataTwo');
		Route::get('/ajax-content-bar-proy', 'reporteDetalladopyController@getgraficbarData');
		Route::get('/ajax-content-lin-proy', 'reporteDetalladopyController@getgraficlinData');

		/*Registro de carta de entrega*/
		Route::get('/reporte_detalladoc', 'reporteDetalladocController@index');
		Route::get('/reporte_detalladoc_data', 'reporteDetalladocController@cartadata');
		Route::get('/reporte_detalladoc_gfc1', 'reporteDetalladocController@cartagfc1');
		Route::get('/reporte_detalladoc_gfc2', 'reporteDetalladocController@cartagfc2');

		/*Registro de distribución*/
		Route::get('/reporte_distribucion', 'reporteDetalladoDistribucionController@index');
		Route::get('/reporte_distrib_data', 'reporteDetalladoDistribucionController@distribdata');
		Route::get('/reporte_distrib_gfc1', 'reporteDetalladoDistribucionController@distribgfc1');
		Route::get('/reporte_distrib_gfc2', 'reporteDetalladoDistribucionController@distribgfc2');
		Route::get('/reporte_distrib_gfc3', 'reporteDetalladoDistribucionController@distribgfc3');

		/*Inventario*/
		Route::get('/inventario', 'SuresteGeneralController@index');
		Route::get('/ajax-hotel', 'SuresteGeneralController@getDatosHotel');
		Route::get('/ajax-antena', 'SuresteGeneralController@queryCantidadAntenas');
		Route::get('/ajax-equipo', 'SuresteGeneralController@queryCantidadEquipo');
		Route::get('/ajax-datos', 'SuresteGeneralController@getDatosHeader');
		Route::get('/getImgHotel', 'SuresteGeneralController@getImgUrl');

		/*Entrega de servicio*/
		Route::get('/entrega', 'entregaController@index');
		Route::get('/entrega-hotel', 'entregaController@getHotel');
		Route::get('/entrega-datos', 'entregaController@getDatosHeader');
		Route::get('/getEntrImg', 'entregaController@getImgUrl');
		Route::get('/entrega-equipo', 'entregaController@queryCantEquipo');
		Route::get('/entrega-antena', 'entregaController@queryCantAntena');
		Route::get('/entrega-datosFecha', 'entregaController@getDatosHeaderF');

		/*Buscador*/
		Route::get('/search', function() { return view('buscador.search'); });
		Route::get('/ajax-search', 'SearchAllController@searchSerieMac');

		/*Diagnostico Uno*/
		Route::get('/DiagHuesped', 'DiagHuespedController@index');
		Route::get('/DiagHuespedAjax','DiagHuespedController@checkGuest');
		Route::get('/DiagHuespedAjax2', 'DiagHuespedController@checkWebSer');

		/*Diagnostico Dos*/
		Route::get('/DiagServer', 'DiagServerController@index');
		Route::get('/DiagServidorAjax', 'DiagServerController@checkRad');
		Route::get('/DiagServidorAjax2','DiagServerController@checkWB');

		/*Perfil*/
		//Route::get('/profile', 'profilesController@index');
		Route::get('/profile', 'profilesController@profile');
		Route::post('/profile','profilesController@update_avatar');
		Route::get('/profiles','profilesController@data_user');
		Route::post('/updatedatas', 'profilesController@update');

		Route::post('/upd_password', 'profilesController@updatetwo');
		/*Configuración de usuarios*/
		Route::get('/config_one', 'UserController@index');
		Route::post('/config_two_c', 'UserController@create');
		Route::post('/config_two_e', 'UserController@editar');
		Route::post('/config_two_sobre', 'UserController@update');
		Route::post('/config_two_ed', 'UserController@edit'); /*ajax de editar*/
		Route::post('/config_two_exit', 'UserController@editDos'); /*ajax de editar*/
		Route::get('/usershow', 'UserController@show');

		Route::post('/config_two_el_c', 'UserController@destroyconsult');
		Route::post('/config_two_el', 'UserController@destroy');


});
