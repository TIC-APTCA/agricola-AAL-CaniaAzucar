<?php

namespace App\Http\Controllers\Archivos\Conductores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Archivos\Conductores\Conductores;
use App\Models\Archivos\Conductores\ConductoresRepo;

class ConductoresController extends Controller
{
	protected $conductoresRepo;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
		
		// Repositorio de Busquedas - ConductoresRepo
		$this->conductoresRepo = new ConductoresRepo();
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// Retornar la vista home
    	return view('/archivos/conductores/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornar la vista registar
    	return view('/archivos/conductores/registrar', compact('conductores'));
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
    			'cedula'					=>	'required|unique:conductores',
    			'nombres'					=>	'required|string',
    			'apellidos'					=>	'required|string',
    			'telefono'					=>	'required|numeric',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'cedula.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$conductores = new Conductores();    	
   		$conductores ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redirigir a la vista vehiculos
    	return redirect()->back();
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
    	$conductores = $this->conductoresRepo->busquedaMulticampo($request);
    	
    	// Retornar la vista home
    	return view('/archivos/conductores/home', compact('conductores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// Buscar conductor por id - CondustoresRepo
    	$conductores = $this->conductoresRepo->busquedaxId($id);
    	
    	// Retornar la vista actualizar
    	return view('/archivos/conductores/actualizar', compact('conductores'));
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
    			'cedula'		=>	'required',
    			'nombres'		=>	'required',
    			'apellidos'		=>	'required',
    			'telefono'		=>	'numeric'
    	);
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	 
    	// Buscar conductor y si no lo encuentra enviar errores 
    	$conductores = Conductores::findOrFail($id);
    	$conductores->fill($request->all());
    	$conductores->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista 
    		return redirect("/conductores");
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// Buscar conductor y si no lo encuentra enviar errores
    	$conductores = Conductores::findOrFail($id);
    	$conductores->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solictadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/conductores");
    	
    }
}
