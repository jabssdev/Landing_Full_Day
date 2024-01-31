<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table="sponsors";

    protected $filliable=[
        'imagen',
        'ruta'
    ];
}
