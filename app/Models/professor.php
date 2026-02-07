<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class professor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'disciplina',
        'nota'
    ];

    public function disciplinas() 
    {
        return $this->hasMany(Disciplina::class);
    }

}
