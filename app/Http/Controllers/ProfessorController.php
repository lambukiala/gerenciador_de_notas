<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Aluno;
use App\Models\professor;


class ProfessorController extends Controller
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
            'email' => 'required|email|unique:alunos',
            
        ]);
         $professor = Professor::create($validated); 
            return response()->json(['message'=> 'Professor cadastrado com sucesso', 'data' => $professor],201);
       
       
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
           $professor = Professor::find($id);
           if (!$professor) {
            return response()->json(['error' => 'Professor não encontrado'], 404);
           }
             $validated = $request->validate([
           'name' => 'required|string',
            'email' => 'required|email|unique:alunos',
            
        ]);
        $professor->update($validated);
        return response()->json($professor, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
         $professor = Professor::find($id);
         if (!$professor) {
            return response()->json(['error'=> 'Professor não encontrado'], 404);
         }
         $professor->delete();
         return response()->json(['message'=> 'Professor eliminado com sucesso'],200);
    }
}
