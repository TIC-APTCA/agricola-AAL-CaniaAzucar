<?php

namespace App\Http\Controllers\Archivos\Zonas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Archivos\Zonas\Estados;
use App\Models\Archivos\Zonas\ZonasRepo;
use App\Models\Archivos\Zonas\Zonas;


class ZonasController extends Controller
{
	
	protected $auth;
	protected $estados;
	protected $zonas;
	
	public function __construct() {
	
		// Verificar autenticación del usuario
		$this->middleware('auth');
	
	
		// Estados
		$this->estados = new Estados();
		$this->zonas  = new ZonasRepo();
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    
    public function create()
    {
        //
        $estados= Estados::all();
                       
    	//redirigir vista al registrar
    	return view('/archivos/zonas/registrar', compact('estados'));
    	
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
    			'codigo'					=>	'required|unique:zonas_geograficas',
    			'descripcion'				=>	'required',
    			'estados_id'			    =>	'required',
    	);
    	
    	// Mensaje al usuario
    	$messages = [
    			'codigo.unique' => 'Ya existen registros relacionados con los datos previamente cargados. Intentelo nuevamente.',
    	];
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules, $messages);
    	
    	// Instanciar el modelo y crear del registro
    	$zonas = new Zonas();    	
   		$zonas ->create($request->all());
   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redirigir a la vista vehiculos
    	return redirect('/zonas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    	
    	$zonas=$this->zonas->busquedaMulticampo($request);
        
    	//redirigir vista al home
    	return view('/archivos/zonas/home', compact('zonas'));
    	
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
    	 $estados= Estados::all();
         $zonas= $this->zonas->busquedaxId($id);
    	
    	// Retornar la vista actualizar
    	return view('archivos/zonas/actualizar', compact('zonas','estados'));
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
    			'codigo'				 	    =>	'required',
    			'descripcion'					=>	'required|numeric',
    			'estados_id'			       	=>	'required|numeric',
    	);
    	 
    	
    	// Buscar  la zafra y si no la encuentra enviar errores
    	$zonas=Zonas::findOrFail($id);
    	$zonas->fill($request->all());
    	$zonas->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista
    	return redirect("/zonas");
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
    	$zonas = Zonas::findOrFail($id);
    	$zonas->delete();
    	
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/zonas");
    }
}
