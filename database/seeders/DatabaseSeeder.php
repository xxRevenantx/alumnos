<?php

namespace Database\Seeders;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Tutor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Storage::deleteDirectory('students');
        Storage::makeDirectory('students');


        User::factory()->create([
            'name' => 'Carlos Nuñez',
            'email' => 'carlos@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        // SE DEBEN EJECUTAR DE MANERA ORDENADA

        // SE PUEDEN CREAR DIRECTAMENTE DESDE EL FACTORY SIN PASAR POR EL SEDEDER
        // Tutor::factory(50)->create();
    
        // PRIMERO SE CREA EL FACTORY DE STUDENT, PASA POR EL SEEDER Y POR ULTIMO SE LLAMA AL SEEDER DE STUDENT
        $this->call([
            SupervisorSeeder::class,
            DirectorSeeder::class,
            LevelSeeder::class,
            GradeSeeder::class,
            GroupSeeder::class,
            GenerationSeeder::class,
            // StudentSeeder::class
        ]);



    }
}
