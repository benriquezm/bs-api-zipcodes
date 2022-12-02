<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZipCodes>
 */
class ZipCodesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'd_codigo' => $this->faker->randomNumber(5),
            'd_asenta' => $this->faker->text(8),
            'd_tipo_asenta' => $this->faker->text(8),
            'd_mnpio' => $this->faker->text(8),
            'd_estado' => $this->faker->text(8),
            'd_ciudad' => $this->faker->text(8),
            'd_cp' => $this->faker->randomNumber(5),
            'c_estado' => $this->faker->randomNumber(2),
            'c_oficina' => $this->faker->randomNumber(5),
            'c_cp' => $this->faker->randomDigit(),
            'c_tipo_asenta' => $this->faker->randomNumber(2),
            'c_mnpio' => $this->faker->randomNumber(3),
            'id_asenta_cpcons' => $this->faker->randomNumber(4),
            'd_zona' => $this->faker->text(8),
            'c_cve_ciudad' => $this->faker->randomNumber(2),
        ];
    }
}
