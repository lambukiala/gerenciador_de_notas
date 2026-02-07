<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Aluno;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\validated;

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
            'aluno_id' => 'required|integer|exists:alunos,id',
            'disciplina_id' => 'required|integer|exists:disciplina,id',
            'nota' => 'required|numeric',
        ]);
        $nota = Nota::create([
            'aluno_id' => $validated['aluno_id'],
            'disciplina_id' => $validated['disciplina_id'],
            'professor_id' => auth()->id(),
            'nota' => $validated['nota'],

        ]);

        return response()->json($nota, 201);
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
                'nota' => 'required|numeric',
            ]);
            $nota->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
            $aluno_id = $nota->aluno_id;
            $nota->delete();

            return response()->json(['msg' => 'Nota eliminada com sucesso', 200]);
    }
}
