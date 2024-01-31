<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    protected $table="contadores";

    protected $filliable=[
        
        'estado',
        'id_contador'
    ];
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

}