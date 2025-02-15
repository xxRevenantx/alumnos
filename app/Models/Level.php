<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    use HasFactory;

    protected $fillable = [
        'level',
        'slug',
        'imagen',
        'color',
        'cct',
        'director_id',
        'supervisor_id',
    ];

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
