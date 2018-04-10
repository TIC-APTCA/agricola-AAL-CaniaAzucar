<?php

namespace App\Http\Controllers\Archivos\Zafras;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Archivos\Zafras\Zafras;
use App\Models\Archivos\Zafras\ZafrasRepo;

class ZafrasController extends Controller
{
 protected $auth;
 protected $zafrasRepo;
 
 public function __construct() 
 {
 	// Verificar la autenticacion del usuario
 	$this->middleware('auth');
 
 	// Repositorio de Busquedas - ZafrasRepo
 	$this->zafrasRepo = new ZafrasRepo();
 }
 
	
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
    	// Generar Codigo de Zafra
    	$codigo_zafra = $this->zafrasRepo->generarCodigoxZafra();
    	
        // redirigir vista al home
		return view('/archivos/zafras/registrar', compact('codigo_zafra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        			
        /// Reglas basicas de validacion
    	$rules = array(
    			'codigo'					=>	'required|unique:zafras',
    			'descripcion'				=>	'required|string',
    			'fecha_inicial'				=>	'required|date',
    			'fecha_final'				=>	'required|date',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'codigo.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$zafras = new Zafras();
   		$zafras ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista 
    	return redirect("/zafras");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       // Busqueda multicampo - ZafrasRepo
    	$zafras = $this->zafrasRepo->busquedaMulticampo($request);
    	
    	// Retornar la vista home
    	return view('/archivos/zafras/home', compact('zafras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        	// Buscar zafras por codigo - ZafrasRepo
    	$zafras = $this->zafrasRepo->busquedaxCodigo($codigo);
    	
    	// Retornar la vista actualizar
    	return view('/archivos/zafras/actualizar', compact('zafras'));
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
    			'codigo'		=>	'required',
    			'descripcion'		=>	'required',
    			'observaciones'		=>	'required',
    			'fecha_inicial'		=>	'required',
    			'fecha_final'		=>	'required',
    	);
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	 
    	// Buscar  la zafra y si no lo encuentra enviar errores 
    	$conductores = Zafras::findOrFail($id);
    	$conductores->fill($request->all());
    	$conductores->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista 
    		return redirect("/zafras");
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
    	$zafras = Zafras::findOrFail($id);
    	$zafras->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/zafras");
    	
    }
}
