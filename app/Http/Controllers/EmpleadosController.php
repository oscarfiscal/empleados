<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmpleadosController extends Controller
{

    protected $empleados;

    public function __construct (Empleados $empleados)
    {
        $this->empleados = $empleados;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $empleados = Empleados::paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $paises = Country::all();
        return view('empleados.crear', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad_nacimiento' => 'required',
       
        ]);
      $empleados =  Empleados::create($request->all());
        return redirect()->route('empleados.index')->with('success','Empleado creado satisfactoriamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleado)
    {
        $paises = Country::all();
        return view('empleados.editar', compact('empleado', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleado)
    {
        
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad_nacimiento' => 'required',
       
        ]);
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleado)
    {
        $empleado->delete();
       
        return redirect()->route('empleados.index');
    }
   
}
