<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'colonia',
        'telefono',
        'celular',
        'no_int',
        'no_ext',
        'email',
        'user_id'
        
    ];


}
