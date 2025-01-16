<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $name =  $this->faker->unique()->randomElement(['Preescolar','Primaria', 'Secundaria']);
        return [
            'name' =>  $name,
            'slug' => Str::slug($name),
        ];
    }
}
