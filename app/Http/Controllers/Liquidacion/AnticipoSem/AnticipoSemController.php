<?php

namespace App\Http\Controllers\Liquidacion\AnticipoSem;


use Illuminate\Http\Request;
use App\Models\Liquidacion\AnticipoSem\AnticipoSem;
use App\Models\Liquidacion\AnticipoSem\AnticipoSemRepo;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;



class AnticipoSemController extends Controller
{
    

	protected $anticiposRepo;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
	
		// Repositorio de Busquedas - ConductoresRepo
		$this->anticiposRepo = new AnticipoSemRepo();
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
    	return view('/liquidaciones/anticipos_semanales/registrar');
    	
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
    			'codigo'					=>	'required|unique:anticipos_semanales',
    			'factor'					=>	'required',
    			'descripcion'				=>	'required',
    			'porcentaje'				=>	'required',
    			'semana'					=>	'required',
    			'fecha_inicial'				=>	'required',
    			'fecha_final'				=>	'required',
    	);
    	 
    	// Mensaje al usuario
    	$messages = [
    			'codigo.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	
    	
    	 
    	// Instanciar el modelo y crear del registro
    	$anticipo = new AnticipoSem();
    	$anticipo ->create($request->all());
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Redirigir a la vista 
    	return redirect("/liquidacion/anticipos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    	// Busqueda multicampo - ConductoresRepo
    	$anticipos = $this->anticiposRepo->busquedaMulticampo($request);
    	
        // Retornar la vista
    	return view('/liquidaciones/anticipos_semanales/home',compact('anticipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // Busqueda multicampo - ConductoresRepo
    	$anticipos = $this->anticiposRepo->busquedaxId($id);
    	
        // Retornar la vista
    	return view('/liquidaciones/anticipos_semanales/actualizar',compact('anticipos'));
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
    			'codigo'				=>	'required',
    			'factor'				=>	'required',
    			'porcentaje'	 		=>	'required',
    			'descripcion'	        =>	'required',
    	 );
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	
    	// Buscar  la zafra y si no lo encuentra enviar errores
    	$anticipos = AnticipoSem::findOrFail($id);
    	$anticipos->fill($request->all());
    	$anticipos->save();
    	 
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Retornar la vista
    	return redirect("/liquidacion/anticipos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar anticipo y si no la encuentra enviar errores
    	$anticipos = AnticipoSem::findOrFail($id);
    	$anticipos->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/liquidacion/anticipos");
    }
}
