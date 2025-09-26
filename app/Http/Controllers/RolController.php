<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=  Rol::included()->filter()->sort()->get();
        return response() ->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:20|unique:rols,nombre'
        ]);

        $rol = Rol::create($data);

        if(!$rol){
            return response()->json([
                'mensaje' => 'Error: rol no se ha creado correctamente'
            ],400);
        }
        else{
            return response()->json([
                'mensaje'=> 'Rol creado con exito',
                'rol' => $rol
            ],201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return response()->json([
            'rol' => $rol
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:20|unique:rols,nombre,'.$rol->id
        ]);

        $rol->update($data);

        return response()->json([
            'mensaje' => 'Rol actualizado con exito',
            'rol' => $rol
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return response()->json([
            'mensaje' => 'Rol '.$rol->nombre.' eliminado con éxito'
        ],200);
    }
}
