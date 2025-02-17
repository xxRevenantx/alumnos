<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            "A",
            "B",
            "C",
            "D",
            "E",
            "F",
        ];
        
        foreach ($groups as $group) {
            \App\Models\Group::create([
                'grupo' => $group,
            ]);
        }
    }
}
