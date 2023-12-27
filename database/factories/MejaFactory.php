<?php

namespace Database\Factories;

use App\Models\Meja;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MejaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meja::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_meja' => $this->faker->randomNumber(0),
            'kapasitas' => $this->faker->randomNumber(0),
            'status' => 'Dipesan',
        ];
    }
}
