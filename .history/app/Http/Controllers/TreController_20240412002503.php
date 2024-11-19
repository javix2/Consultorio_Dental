<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TratamientoControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $datos = Treatment::paginate(2);
        // return redirect()->;
        // $datos = DB::select("select * from tratamiento");
        //  return view('tratamiento.index')->with("datos", $datos);
         return view('tratamiento.index', compact('datos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function crear(){
    //     $doctors = DB::select("select * from doctor");
    //         return view('tratamiento.crear')->with("doctors", $doctors); 
    // }
    public function create()
    { 
        // $datos = Treatment::with('paciente')->get();

        // return view('tratamiento.index', compact('tratamientos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $datos = new Treatment();
        $datos->nombre = $request->txtnombre;
        $datos->descripcion = $request->txtdescripcion;
        $datos->precio = $request->txtprecio;
        $datos->doctor_id = $request->txtdoctor;

        $datos->save();

        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('tratamiento.index')->with('success', 'Datos registrado correctamente.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // try {
        //     $sql = DB::update(" update tratamiento set nombre=?, descripcion=?, precio=?, iddoctor=? where idtratamiento=? ", [
                
        //         $request->txtnombre,
        //         $request->txtdesc,
        //         $request->txtprecio,
        //         $request->txtiddoctor
                
        //     ]);
            
        //     if ($sql == 0) {
        //         $sql = 1;
        //     }
        // } catch (\Throwable $th) {
        //     $sql = 0;
        // }
        // if ($sql == true) {
        //     return back()->with("correcto", "Datos modificado correctamente");
        // } else {
        //     return back()->with("incorrecto", "Error al modificarse");
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
