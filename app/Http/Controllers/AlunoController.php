<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         return response()->json(Aluno::all());
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
         $aluno = Aluno::create($validated); 
            return response()->json(['message'=> 'Aluno cadastrado com sucesso', 'data' => $aluno],201);
           
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
    public function update(Request $request,  $id)
    {
        //
            $aluno = Aluno::find($id);
            if(!$aluno){
                return response()->json(['error' => 'Aluno não encontrado'], 404);
            }

                 $validated = $request->validate([
           'name' => 'required|string',
            'email' => 'required|email|unique:alunos',
            
        ]);
        $aluno->update($validated);
        return response()->json($aluno, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $aluno = Aluno::find($id);
        if (!$aluno) {


            return response()->json(['error' => 'Aluno não encontrado'], 404);

        }
        $aluno->delete();
        return response()->json(['message'=> 'Aluno eliminado com sucesso'], 200);
    }
}
