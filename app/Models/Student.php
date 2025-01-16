<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'curp',
        'matricula',
        'nombre',
        'apellidoP',
        'apellidoM',
        'edad',
        'fechaNacimiento',
        'sexo',
        'status',
        'level_id',
        'grade_id',
        'group_id',
        'generation_id',
        'tutor_id',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }


    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }



}
