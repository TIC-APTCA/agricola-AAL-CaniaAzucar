<?php

namespace App\Http\Controllers\Agronomia\Estimados\Zafras;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agronomia\Estimados\EstimadosZafra;
use App\Models\Archivos\Zafras\ZafrasRepo;
use App\Models\Agronomia\Estimados\EstimadosZafraRepo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Archivos\Zafras\Zafras;

class EstimadosZafrasController extends Controller
{
	protected $estimadosRepo;
	protected $zafras;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
	
		// Repositorio de Busquedas
		$this->estimadosRepo = new EstimadosZafraRepo();
		$this->zafras        = new ZafrasRepo();
	}
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	
    	// Busqueda multicampo
    	$zafras_act=$this->zafras->busquedaMulticampo($request);
    	
        // Retornar la vista
    	return view('/agronomia/estimados/zafras/registrar', compact('zafras_act'));
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
    			'zafras_id'				 	    =>	'required|unique:estimados_zafra',
    			'rendimiento'					=>	'required|numeric',
    			'cana'				         	=>	'required|numeric',
    			'azucar'				        =>	'required|numeric',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'zafras.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request,$rules,$messages);
    	
    	// Instanciar el modelo y crear del registro
    	$estimados = new EstimadosZafra();
   		$estimados ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista 
    		return redirect("/estimados/zafra");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Busqueda multicampo 
    	$estimados = $this->estimadosRepo->busquedaMulticampo($request);
    	
    	// Retornar la vista
    	return view('/agronomia/estimados/zafras/home', compact('estimados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimados= $this->estimadosRepo->busquedaxId($id);
        
        return view('/agronomia/estimados/zafras/actualizar', compact('estimados'));
        
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
        // Reglas basicas de validacion
    	$rules = array(
    			'zafras_id'				 	    =>	'required',
    			'rendimiento'					=>	'required|numeric',
    			'cana'				         	=>	'required|numeric',
    			'azucar'				        =>	'required|numeric',
    	);
    	
    	    	
    	// Buscar  la zafra y si no la encuentra enviar errores
    	$estimados=EstimadosZafra::findOrFail($id);
    	$estimados->fill($request->all());
    	$estimados->save();
    	 
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Retornar la vista
    	return redirect("/estimados/zafra");
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
     // Buscar zafra y si no la encuentra enviar errores
    	$estimados = EstimadosZafra::findOrFail($id);
    	$estimados->delete();
    	
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/estimados/zafra");
    }
}
