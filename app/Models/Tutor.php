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
        'exterior',
        'interior',
        'localidad',
        'colonia',
        'cp',
        'municipio',
        'estado',
        'telefono',
        'celular',
        'email',
        'parentesco',
        'ocupacion',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
