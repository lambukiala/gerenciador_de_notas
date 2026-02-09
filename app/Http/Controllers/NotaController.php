<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Nota::all());
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
           'aluno' => 'required|integer|exists:aluno,id',
            'disciplina' => 'required|integer|exists:disciplinas,id',
            'nota' => 'required|numeric|min:0|max:20', 
        ]);
         $nota = Nota::create($validated); 
            return response()->json(['message'=> 'Nota cadastrada com sucesso', 'data' => $nota],201);
           
         
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
    public function update(Request $request, Nota $nota)
    {
        //
            $validated = $request->validate([

            'aluno_id' => 'required|integer|exists:alunos,id',
            'disciplina_id' => 'requerid|integer|existis:disciplinas,id',
            'professor_id' => 'required|integer|existis:professors,id',
            'nota' => 'required|numeric',
            ]);

            $nota->update($validated);
            return response()->json($nota, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
            $nota->delete();
            return response()->json(null, 204);
    }
}
