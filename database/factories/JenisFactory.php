<?php

namespace Database\Factories;

use App\Models\Jenis;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jenis::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_jenis' => $this->faker->text(255),
            'kategori_id' => \App\Models\Kategori::factory(),
        ];
    }
}
