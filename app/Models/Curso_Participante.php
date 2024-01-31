<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Participante extends Model
{
    protected $table="curso_participante";

    protected $filliable=[
        'id_curso',
        'id_participante'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class,'id_curso');
    }

    public function participante(){
        return $this->belongsTo(Participante::class,'id_participante');
    }
}