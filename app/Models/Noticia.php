<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table="noticias";

    protected $filliable=[
        'imagen',
        'fecha',
        'titulo',
        'descripcion',
        'autor'
    ];
}
