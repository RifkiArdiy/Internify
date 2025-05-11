<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

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

    protected $model = Level::class;

    public function definition(): array
    {

        return [
            //
            'level_nama' => $this->faker->unique()->randomElement(['Administrator', 'Mahasiswa', 'Dosen', 'Company']),
        ];
    }
}
