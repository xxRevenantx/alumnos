<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
        ];
        
        foreach ($grades as $grade) {
            \App\Models\Grade::create([
                'name' => $grade,
            ]);
        }
    }
}
