<?php

namespace Database\Factories;

use App\Models\Transaksis;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaksis::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'total_harga' => $this->faker->randomNumber(2),
            'metode_pembayaran' => 'Cash',
            'keterangan' => $this->faker->text(),
        ];
    }
}
