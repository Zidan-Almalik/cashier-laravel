<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jumlah' => $this->faker->randomNumber(0),
            'sub_total' => $this->faker->randomNumber(2),
            'menu_id' => \App\Models\Menu::factory(),
            'transaksis_id' => \App\Models\Transaksis::factory(),
        ];
    }
}
