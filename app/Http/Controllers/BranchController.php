<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('user')->get();
        return response()->json($branches);
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
            'nombre_sucursal'=> 'required|string|max:50',
            'nit' => 'required|string',
            'longitud' => 'required|string',
            'latitud' => 'required|string',
            'direccion' => 'required|string'
        ]);

        $branch = Branch::create($data);
        if(!$branch){
            return response()->json([
                'mensaje' => 'Error: no se ha podido crear la sucursal'
            ],400);
        }else{
        return response()->json([
            'mensaje' => 'Sucursal creada con exito',
            'sucursal' => $branch->nombre_sucursal
        ],201);            
        }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
