<?php

namespace App\Http\Controllers\Liquidacion\Conceptos;

use Illuminate\Http\Request;
use App\Models\Liquidacion\Conceptos\Conceptos;
use App\Models\Liquidacion\Conceptos\ConceptosRepo;
use App\Models\Liquidacion\Correlativo\CorrelativoRepo;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Liquidacion\Correlativo\Correlativo;

class ConceptosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	protected $conceptosRepo;
	protected $correlativoRepo;
	
	public function __construct() {
		// Verificar la autenticacion del usuario
		$this->middleware('auth');
	
		// Repositorio de Busquedas
		$this->conceptosRepo   = new ConceptosRepo();
		$this->correlativoRepo = new CorrelativoRepo();
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
    	
    	$correlativo=$this->correlativoRepo->busquedaCorrelativo();
       
    	 
    	// Retornar la vista
    	return view('/liquidaciones/conceptos/registrar', compact('correlativo'));
        
    
    	
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
    			'tipos_id'				 	    =>	'required',
    			'codigo'						=>	'required',
    			'descripcion'		         	=>	'required',
    			'frecuencias_id'		        =>	'required',
    	);
    	
    	
    	
    	
    	// Enviar errores si los hay
    	$errores = $this->validate($request,$rules);
    	
    	// Instanciar el modelo y crear del registro
    	$conceptos = new Conceptos();
   		$conceptos ->create($request->all());
   
   		
   		//$correlativo = new CorrelativoRepo();
   		//$correlativos->asignacion = $request->input('asignacion');
   		//$correlativos->deduccion  = $request->input('deduccion');
   		//$correlativo->create($request->input('asignacion'),$request->input('deduccion'));
   		
   		$correlativo=Correlativo::where('id', '=', "1")->first();
   		
   		// Si existe
   		if(count($correlativo)>=1){
   			// Seteamos un nuevo titulo
   			$correlativo->asignacion = $request->input('asignacion');
   			$correlativo->deduccion  = $request->input('deduccion');
   			// Guardamos en base de datos
   			$correlativo->save();
   		}
   		

   		   	 
   		// Mensaje al usuario
   		\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Retornar la vista 
    		return redirect("/liquidacion/conceptos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    //Busqueda multicampo
      $conceptos = $this->conceptosRepo->busquedaMulticampo($request);
    	 
    	// Retornar la vista
    	return view('/liquidaciones/conceptos/home',compact('conceptos'));
    	
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
    	$conceptos = $this->conceptosRepo->busquedaxId($id);
    	
    	// Retornar la vista actualizar
    	return view('/liquidaciones/conceptos/actualizar', compact('conceptos'));
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
    			'codigo'		        =>	'required',
    			'frecuencias_id'		=>	'required',
    			'descripcion'		    =>	'required',
    			'tipos_id'				=>	'required'
    	);
    	 
    	// Enviar errores si los hay
    	$errores = $this->validate($request, $rules);
    	 
    	// Buscar conductor y si no lo encuentra enviar errores 
    	$conceptos = Conceptos::findOrFail($id);
    	$conceptos->fill($request->all());
    	$conceptos->save();
    	
    	// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solicitadas.");
    	
    	// Redireccionar a la vista 
    		return redirect("/liquidacion/conceptos");
    	
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
    	$conceptos = Conceptos::findOrFail($id);
    	$conceptos->delete();
    	
		// Mensaje al usuario
    	\Session::flash('flash_messages', "Se han realizado exitosamente todas las operaciones solictadas.");
    	
    	// Redireccionar a la vista
    		return redirect("/liquidacion/conceptos");
    }
}
