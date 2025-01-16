<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 estudiantes
        $student  = Student::factory(50)->create();
        
        $student->each(function ($student) {
            Image::factory(1)->create([
                'imageable_id' => $student->id,
                'imageable_type' => 'App\Models\Student',
            ]);
        });
    
    }
}
