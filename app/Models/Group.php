<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    use HasFactory;


    protected $fillable = [
        'name',
        'status',
        'grade_id',
        'generation_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    
}
