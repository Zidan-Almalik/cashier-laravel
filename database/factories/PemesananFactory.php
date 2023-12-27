<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemesananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemesanan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_pemesanan' => $this->faker->date(),
            'jam_mulai' => $this->faker->time(),
            'jam_selesai' => $this->faker->time(),
            'nama_pemesan' => $this->faker->text(255),
            'jumlah_pelanggan' => $this->faker->randomNumber(0),
            'meja_id' => \App\Models\Meja::factory(),
        ];
    }
}
