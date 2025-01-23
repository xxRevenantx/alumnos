<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 generaciones
        // Generation::factory(6)->create();

        $generations = [
            "2010-2016",
            "2011-2017",
            "2012-2018",
            "2013-2019",
            "2014-2020",
            "2015-2021",
        ];

        foreach ($generations as $generation) {
            Generation::create([
                'name' => $generation,
                'inicio' => "2024-01-01",
                'fin' => "2024-12-31",
                'status' => 1,
            ]);
        }

    }
}
