<?php

use App\Http\Controllers\AuthController;

use App\Models\Archivos\Zonas\Estados;
use App\Models\Archivos\Zonas\Municipios;
use App\Models\Archivos\Zonas\Parroquias;

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the controller to call when that URI is requested.
 |
 */


// Ruta del controlador home
Route::get('/home', 'HomeController@index');


###############################################################################

// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


###############################################################################
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////ARCHIVOS////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
###############################################################################

// Ruta del controlador archivos/zafras
###############################################################################
Route::get('/zafras', 'Archivos\Zafras\ZafrasController@show');
Route::get('/zafras/registrar', 'Archivos\Zafras\ZafrasController@create');
Route::post('/zafras/registrar', 'Archivos\Zafras\ZafrasController@store');
Route::get('/zafras/actualizar/{id}', 'Archivos\Zafras\ZafrasController@edit');
Route::post('/zafras/actualizar/{id}', 'Archivos\Zafras\ZafrasController@update');
Route::get('/zafras/eliminar/{id}', 'Archivos\Zafras\ZafrasController@destroy');

// Ruta del controlador archivos/productores
###############################################################################
Route::get('/productores', 'Archivos\Productores\ProductoresController@show');
Route::get('/productores/registrar', 'Archivos\Productores\ProductoresController@create');
Route::post('/productores/registrar', 'Archivos\Productores\ProductoresController@store');
Route::get('/productores/actualizar/{id}', 'Archivos\Productores\ProductoresController@edit');
Route::post('/productores/actualizar/{id}', 'Archivos\Productores\ProductoresController@update');
Route::get('/productores/eliminar/{id}', 'Archivos\Productores\ProductoresController@destroy');

// Ruta del controlador archivos/zonas
###############################################################################
Route::get('/zonas', 'Archivos\Zonas\ZonasController@show');
Route::get('/zonas/registrar', 'Archivos\Zonas\ZonasController@create');
Route::post('/zonas/registrar', 'Archivos\Zonas\ZonasController@store');
Route::get('/zonas/actualizar/{id}', 'Archivos\Zonas\ZonasController@edit');
Route::post('/zonas/actualizar/{id}', 'Archivos\Zonas\ZonasController@update');
Route::get('/zonas/eliminar/{id}', 'Archivos\Zonas\ZonasController@destroy');

// Ruta del controlador archivos/haciendas
###############################################################################
Route::get('/haciendas', 'Archivos\Haciendas\HaciendasController@index');
Route::get('/haciendas/productores', 'Archivos\Haciendas\HaciendasController@productores');
Route::get('/haciendas/registrar/{id}', 'Archivos\Haciendas\HaciendasController@create');
Route::post('/haciendas/registrar/{id}', 'Archivos\Haciendas\HaciendasController@store');
Route::get('/haciendas/actualizar/{id}', 'Archivos\Haciendas\HaciendasController@edit');
Route::post('/haciendas/actualizar/{id}', 'Archivos\Haciendas\HaciendasController@update');
Route::get('/haciendas/eliminar/{id}', 'Archivos\Haciendas\HaciendasController@destroy');


// Ruta del controlador archivos/sectores
###############################################################################
Route::get('/sectores', 'Archivos\Sectores\SectoresController@index');
Route::get('/sectores/registrar/{id}', 'Archivos\Sectores\SectoresController@create');
Route::post('/sectores/registrar/{id}', 'Archivos\Sectores\SectoresController@store');


// Ruta del controlador archivos/vehiculos
###############################################################################
Route::get('/vehiculos', 'Archivos\Vehiculos\VehiculosController@show');
Route::get('/vehiculos/registrar', 'Archivos\Vehiculos\VehiculosController@create');
Route::post('/vehiculos/registrar', 'Archivos\Vehiculos\VehiculosController@store');
Route::get('/vehiculos/actualizar/{id}', 'Archivos\Vehiculos\VehiculosController@edit');
Route::post('/vehiculos/actualizar/{id}', 'Archivos\Vehiculos\VehiculosController@update');
Route::get('/vehiculos/eliminar/{id}', 'Archivos\Vehiculos\VehiculosController@destroy');


// Ruta del controlador archivos/conductores
###############################################################################
Route::get('/conductores', 'Archivos\Conductores\ConductoresController@show');
Route::get('/conductores/registrar', 'Archivos\Conductores\ConductoresController@create');
Route::post('/conductores/registrar', 'Archivos\Conductores\ConductoresController@store');
Route::get('/conductores/actualizar/{id}', 'Archivos\Conductores\ConductoresController@edit');
Route::post('/conductores/actualizar/{id}', 'Archivos\Conductores\ConductoresController@update');
Route::get('/conductores/eliminar/{id}', 'Archivos\Conductores\ConductoresController@destroy');


// Ruta del controlador tablones
###############################################################################
Route::get('/tablones', 'Archivos\Tablones\TablonesController@index');
Route::get('/tablones/sectores', 'Archivos\Tablones\TablonesController@create_01');
Route::get('/tablones/registrar', 'Archivos\Tablones\TablonesController@create');

###############################################################################
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////AGRONOMIA////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
###############################################################################


// Ruta del controlador agronomia/estimados
###############################################################################
Route::get('/estimados/hacienda', 'Agronomia\Estimados\Haciendas\EstimadosHaciendasController@showHaciendas');
Route::get('/estimados/hacienda/sectores', 'Agronomia\Estimados\Haciendas\EstimadosHaciendasController@showSectores');
Route::get('/estimados/haciendas/registrar', 'Agronomia\Estimados\Haciendas\EstimadosHaciendasController@createHacienda');

Route::get('/estimados/fecha', 'Agronomia\Estimados\Fechas\EstimadosFechasController@show');
Route::get('estimados/fechas/registrar', 'Agronomia\Estimados\Fechas\EstimadosFechasController@create');
Route::post('/estimados/fechas/registrar', 'Agronomia\Estimados\Fechas\EstimadosFechasController@store');
Route::get('/estimados/fechas/actualizar/{id}', 'Agronomia\Estimados\Fechas\EstimadosFechasController@edit');
Route::post('/estimados/fechas/actualizar/{id}', 'Agronomia\Estimados\Fechas\EstimadosFechasController@update');
Route::get('/estimados/fechas/eliminar/{id}', 'Agronomia\Estimados\Fechas\EstimadosFechasController@destroy');

Route::get('/estimados/zafra', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@show');
Route::get('estimados/zafras/registrar', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@create');
Route::post('estimados/zafras/registrar', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@store');
Route::get('/estimados/zafras/actualizar/{id}', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@edit');
Route::post('/estimados/zafras/actualizar/{id}', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@update');
Route::get('/estimados/zafras/eliminar/{id}', 'Agronomia\Estimados\Zafras\EstimadosZafrasController@destroy');


###############################################################################
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////LIQUIDACIONES//////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
###############################################################################


// Ruta del controlador Liquidaciones/Conceptos
###############################################################################
Route::get('/liquidacion/conceptos', 'Liquidacion\Conceptos\ConceptosController@show');
Route::get('/liquidacion/conceptos/registrar', 'Liquidacion\Conceptos\ConceptosController@create');
Route::post('/liquidacion/conceptos/registrar', 'Liquidacion\Conceptos\ConceptosController@store');
Route::get('/liquidacion/conceptos/actualizar/{id}', 'Liquidacion\Conceptos\ConceptosController@edit');
Route::post('/liquidacion/conceptos/actualizar/{id}', 'Liquidacion\Conceptos\ConceptosController@update');
Route::get('/liquidacion/conceptos/eliminar/{id}', 'Liquidacion\Conceptos\ConceptosController@destroy');

// Ruta del controlador Liquidaciones/Anticipos Semanales
###############################################################################
Route::get('/liquidacion/anticipos', 'Liquidacion\AnticipoSem\AnticipoSemController@show');
Route::get('/liquidacion/anticipos/registrar', 'Liquidacion\AnticipoSem\AnticipoSemController@create');
Route::post('/liquidacion/anticipos/registrar', 'Liquidacion\AnticipoSem\AnticipoSemController@store');
Route::get('/liquidacion/anticipos/actualizar/{id}', 'Liquidacion\AnticipoSem\AnticipoSemController@edit');
Route::post('/liquidacion/anticipos/actualizar/{id}', 'Liquidacion\AnticipoSem\AnticipoSemController@update');
Route::get('/liquidacion/anticipos/eliminar/{id}', 'Liquidacion\AnticipoSem\AnticipoSemController@destroy');




