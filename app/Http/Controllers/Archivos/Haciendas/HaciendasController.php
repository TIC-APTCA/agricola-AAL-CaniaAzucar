<?php

namespace App\Http\Controllers\Archivos\Haciendas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Archivos\Productores\Productores;
use App\Models\Archivos\Productores\ProductoresRepo;
use App\Models\Archivos\Zonas\ZonasRepo;
use App\Models\Archivos\Haciendas\Haciendas;
use App\Models\Archivos\Haciendas\HaciendasRepo;
use Illuminate\Database\Eloquent\Model;

class HaciendasController extends Controller
{
	
	protected $auth;
	protected $productores;
	protected $haciendas;
	
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
		
		$this->productores = new ProductoresRepo();
		$this->haciendas   = new HaciendasRepo(); 
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$haciendas=$this->haciendas->busquedaMulticampo($request);
    	
    	return view('/archivos/haciendas/home', compact('haciendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productores()
    {
    	
    	$productores= Productores::all();
    	
    	return view('/archivos/haciendas/productores',compact('productores'));
    }

    
    public function create($id)
    {
    	 
    	$productor=$this->productores->busquedaxId($id);
    	$zonas= ZonasRepo::all();
    	 
    	return view('/archivos/haciendas/registrar',compact('productor','zonas'));
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
    			'codigo'					=>	'required|unique:haciendas',
    			'zonas_id'					=>	'required|numeric',
    			'descripcion'				=>	'required',
    			'telefono'					=>	'required|numeric',
    			'direccion'					=>	'required',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'codigo.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$haciendas = new Haciendas();    	
   		$haciendas ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redirigir a la vista vehiculos
    	return redirect('/haciendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Retornar la vista home
    	return view('/archivos/haciendas/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $haciendas= $this->haciendas->busquedaxId($id);
        $zonas= ZonasRepo::all();
    	
    	return view('/archivos/haciendas/actualizar', compact('haciendas','zonas'));
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
    			'codigo'					=>	'required|',
    			'zonas_id'					=>	'required|numeric',
    			'descripcion'				=>	'required',
    			'telefono'					=>	'required|numeric',
    			'direccion'					=>	'required',
    	);
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	
    	// Buscar  la zafra y si no lo encuentra enviar errores
    	$haciendas = Haciendas::findOrFail($id);
    	$haciendas->fill($request->all());
    	$haciendas->save();
    	 
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	 
    	// Retornar la vista
    	return redirect("/haciendas");
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
    	$haciendas = Haciendas::findOrFail($id);
    	$haciendas->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/haciendas");
    
    }
}
