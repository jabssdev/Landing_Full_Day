<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table="participantes";

    protected $filliable=[
        'nombre',
        'apellido',
        'correo',
        'celular',
        'dni',
        'direccion',
        'lugar',
        'especialidad',
        'imagen',
        'pagos',
        'ruta',
        'estado',
        'id_curso'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class,'id_curso');
    }
}