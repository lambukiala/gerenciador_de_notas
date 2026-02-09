<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nota extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'alunos_id',
        'disciplinas_id',
        'nota',
    ];
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
    public function professor()
    {
        return $this->belongsTo(Professor::class);
            
        
    }
}
