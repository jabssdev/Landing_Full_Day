<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table="sliders";

    protected $filliable=[
        'imagen_web',
        'imagen_movil',
        'titulo',
        'subtitulo',
        'video',
    ];
}
