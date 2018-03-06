<?php

namespace App\Http\Controllers\Archivos\Sectores;

use App\Models\Archivos\Haciendas\HaciendasRepo;
use App\Models\Archivos\Sectores\Sectores;
use App\Models\Archivos\Sectores\SectoresRepo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class SectoresController extends Controller
{
	
	protected $haciendas;
	protected $sectores;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
		
		$this->haciendas   = new HaciendasRepo();
		$this->sectores    = new SectoresRepo();
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
    	$haciendas=$this->haciendas->busquedaMulticampo($request);
    	
    	// Retornar la vista home
    	return view('/archivos/sectores/home', compact('haciendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //
    	$haciendas=$this->haciendas->busquedaxId($id);
    	$sectores=$this->sectores->busquedaxHacienda($id);
    	
    	
    	
    	return view('/archivos/sectores/registrar',compact('haciendas','sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// Reglas basicas de validacion
    	$rules = array(
    			'haciendas_id'					=>	'required',
    			'codigo_sector'					=>	'required',
    			'descripcion'					=>	'required',
    	);
    	 
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	 
    	// Instanciar el modelo y crear del registro
    	$sectores = new Sectores();
    	$sectores ->create($request->all());
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Retornar la vista
    	return redirect("/sectores");
    }

    /**protected $haciendas;
     * Display the specified resource.
     *
     * @param  int  $idhttps://bancaenlinea.bicentenariobu.com/HB/frontEnd/timeout.jsp
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
