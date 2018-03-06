<?php

namespace App\Http\Controllers\Agronomia\Estimados\Fechas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Agronomia\Estimados\EstimadosFecha;
use App\Models\Agronomia\Estimados\EstimadosFechaRepo;
use Illuminate\Database\Eloquent\Model;

class EstimadosFechasController extends Controller
{
	
	protected $estimadosRepo;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
	
		// Repositorio de Busquedas
		$this->estimadosRepo = new EstimadosFechaRepo();
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
    public function create()
    {
        // Retornar la vista
    	return view('/agronomia/estimados/fechas/registrar');
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
    			'fecha_inicial'					=>	'required|date',
    			'fecha_final'					=>	'required|date',
    			'rendimiento'					=>	'required|numeric',
    			'azucar'				        =>	'required|numeric',
    			'cana'					        =>	'required|numeric',
    	);
    	
    	    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	
    	// Instanciar el modelo y crear del registro
    	$estimados = new EstimadosFecha();   	
   		$estimados ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista 
    		return redirect("/estimados/fecha");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    	
    	// Busqueda por fechas
    	$estimados = $this->estimadosRepo->busquedaFecha($request);
    	
    	// Retornar la vista
    	return view('/agronomia/estimados/fechas/home', compact('estimados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $estimados= $this->estimadosRepo->busquedaxCodigo($id);
    	
    	// Retornar la vista actualizar
    	return view('/agronomia/estimados/fechas/actualizar', compact('estimados'));
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
    	// Reglas de validación...
    	$rules = array(
    			'fecha_inicial'		=>	'required',
    			'fecha_final'		=>	'required',
    			'rendimiento'	   	=>	'required',
    			'cana'	         	=>	'required',
    			'azucar'		    =>	'required',
    	);
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	
    	// Buscar  la zafra y si no lo encuentra enviar errores
    	$estimados = EstimadosFecha::findOrFail($id);
    	$estimados->fill($request->all());
    	$estimados->save();
    	 
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Retornar la vista
    	return redirect("/estimados/fecha");
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
    	$estimados = EstimadosFecha::findOrFail($id);
    	$estimados->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/estimados/fecha");
    }
}
