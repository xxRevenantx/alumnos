<?php

namespace Database\Seeders;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Level;
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

    
        Level::factory(3)->create();
        Grade::factory(6)->create();
        Group::factory(6)->create();
        Generation::factory(6)->create();
    
        $this->call([
            StudentSeeder::class
        ]);

        Tutor::factory(50)->create();

    }
}
