<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\disciplina;
class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
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
        //
         $validated = $request->validate([
           'name' => 'required|string',
            'description' => 'nullable|string',
            
        ]);
         $disciplina = Disciplina::create($validated); 
            return response()->json(['message'=> 'Disciplina cadastrado com sucesso', 'data' => $disciplina],201);
       
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
    public function update(Request $request, $id)
    {
        //
         $validated = $request->validate([
           'name' => 'required|string',
            'description' => 'nullable|string',
            
        ]);
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->update($validated);

        return response()->json(['message' => 'Disciplina atualizada com sucesso', 'data' => $disciplina], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();
        return response()->json(['message' => 'Disciplina eliminada com sucesso'], 200);
    }
}
