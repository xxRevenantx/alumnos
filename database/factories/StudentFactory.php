<?php

namespace Database\Factories;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Level;
use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->firstName();
        $lastName1 = $this->faker->lastName();
        $lastName2 = $this->faker->lastName();
        $dob = $this->faker->date('Y-m-d'); // Fecha de nacimiento
        $sex = $this->faker->randomElement(['H', 'M']); // Sexo: H (Hombre) o M (Mujer)
        $state = $this->faker->randomElement([
            'AS', 'BS', 'CS', 'CL', 'DF', 'GT', 'HG', 'JC', 'MC', 'MN', 'MS', 'NT', 'NL', 'OC', 'PL', 'QR', 'SP', 'SL', 'SR', 'TC', 'TS', 'TL', 'YN', 'ZS'
        ]); // Estado de nacimiento

        // Extracción de los apellidos y nombre para el CURP
        $apellido1 = strtoupper(substr($lastName1, 0, 2)); // Primeras dos letras del primer apellido
        $apellido2 = strtoupper(substr($lastName2, 0, 1)); // Primera letra del segundo apellido
        $primerNombre = strtoupper(substr($firstName, 0, 1)); // Primera letra del primer nombre

        // Fecha de nacimiento en formato AA/MM/DD
        $fechaNacimiento = str_replace("-", "", substr($dob, 2, 8)); // Eliminar guiones

        // Generar la homoclave (tres caracteres aleatorios)
        $homoclave = strtoupper($this->faker->lexify('?????')); // 5 letras aleatorias

        // Formar el CURP completo (18 caracteres)
        $curp = $apellido1 . $apellido2 . $primerNombre . $fechaNacimiento . $sex . $state . $homoclave;

        // Asegurarse que el CURP tenga exactamente 18 caracteres
        $curp = substr($curp, 0, 18);

        return [
            'curp' => $curp,
            'matricula' => $this->faker->unique()->word,
            'nombre' => $this->faker->firstName(),
            'apellidoP' => $this->faker->lastName(),
            'apellidoM' => $this->faker->lastName(),
            'edad' => $this->faker->numberBetween(5, 18),
            'fechaNacimiento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['H', 'M']),
            'status' => $this->faker->randomElement(['1', '2']),
            'level_id' => Level::all()->random()->id,
            'grade_id' => Grade::all()->random()->id,
            'group_id' => Group::all()->random()->id,
            'generation_id' => Generation::all()->random()->id,
            'tutor_id' => Tutor::all()->random()->id,
        ];


    }
}
