<?php

namespace App\Http\Controllers\Archivos\Vehiculos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Archivos\Vehiculos\Vehiculos;
use App\Models\Archivos\Vehiculos\VehiculosRepo;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	protected $vehiculosRepo;

	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
		
		// Repositorio de Busquedas - VehiculosRepo
		$this->vehiculosRepo = new VehiculosRepo();
	}
	
    public function index()
    {
    	// Retornar la vista home
    	return view('/archivos/vehiculos/home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// Retornar la vista registar
    	return view('/archivos/vehiculos/registrar');
    }

    /**Vehiculos();
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// Reglas basicas de validacion
    	$rules = array(
    			'placa'					=>	'required|unique:vehiculos',
    			'vehiculos_tipos_id'	=>	'required',
    			'vehiculos_marcas_id'	=>	'required',
    			'vehiculos_modelos_id'	=>	'required'
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'placa.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$vehiculos = new Vehiculos();
    	$vehiculos->create($request->all());
   
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

    	// Busqueda multicampo - VehiculosRepo
    	$vehiculos = $this->vehiculosRepo->busquedaMulticampo($request);
    	
    	// Retornar la vista home
    	return view('/archivos/vehiculos/home', compact('vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// Buscar vehiculo por id - VehiculosRepo
    	$vehiculos = $this->vehiculosRepo->busquedaxId($id);
    	 
    	// Retornar la vista
    	return view('/archivos/vehiculos/actualizar', compact('vehiculos'));
    	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     **/
    
    public function update(Request $request, $id)
    {
    	// Reglas de validación...
    	$rules = array(
    			'placa'						=>	'required',
    			'vehiculos_tipos_id'		=>	'required',
    			'vehiculos_marcas_id'		=>	'required',
    			'vehiculos_modelos_id'		=>	'required',
    			'remolque'					=>	'required'
    	);
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	
    	// Buscar vehiculo y si no lo encuentra enviar errores 
    	$vehiculos = Vehiculos::findOrFail($id);
    	$vehiculos ->fill($request->all());
    	$vehiculos ->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Redireccionar a la vista
    	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// Buscar vehiculo y si no lo encuentra enviar errores
        $vehiculos = Vehiculos::findOrFail($id);
    	$vehiculos->delete();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Redireccionar a la vista
    	return redirect()->back();
    }
}
