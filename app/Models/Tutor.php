<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = [
        'curp',
        'nombre',
        'apellidoP',
        'apellidoM',
        'calle',
        'noext',
        'noint',
        'colonia',
        'cp',
        'localidad',
        'municipio',
        'estado',
        'telefono',
        'celular',
        'email',
        'student_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
