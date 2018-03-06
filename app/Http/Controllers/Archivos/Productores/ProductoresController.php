<?php

namespace App\Http\Controllers\Archivos\Productores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Archivos\Productores\Productores;
use App\Models\Archivos\Productores\ProductoresRepo;


class ProductoresController extends Controller
{
	

	protected $productoresRepo;
	
	public function __construct() {
		
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
	
		// Repositorio de Busquedas - ProductoresRepo
		$this->productoresRepo = new ProductoresRepo();
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retornar la vista home
    	return view('/archivos/productores/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornar la vista registar
    	return view('/archivos/productores/registrar', compact('productores'));
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
    			'cedula'					=>	'required|productores',
    			'nombres'					=>	'required|string',
    			'apellidos'					=>	'required|string',
    			'correo'					=>	'required|string',
    			'telefono'					=>	'required|numeric',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'cedula.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	 
    	// Enviar errores si los hay
    	//$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$productores = new Productores();  	
   		$productores ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redirigir a la vista 
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
        	// Busqueda multicampo - ProductoresRepo
    	$productores = $this->productoresRepo->busquedaMulticampo($request);
    	
    	// Retornar la vista home
    	return view('/archivos/productores/home', compact('productores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscar conductor por id - ProductoresRepo
    	$productores = $this->productoresRepo->busquedaxId($id);
    	
    	// Retornar la vista actualizar
    	return view('/archivos/productores/actualizar', compact('productores'));
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
    			'correo'		=>	'required|email',
    			'telefono'		=>	'required|numeric',
    	);
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	 
    	// Buscar conductor y si no lo encuentra enviar errores 
    	$productores = Productores::findOrFail($id);
    	$productores->fill($request->all());
    	$productores->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista 
    	return redirect("/productores");
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
    	$productores = Productores::findOrFail($id);
    	$productores->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    	return redirect("/productores");
    }
}
