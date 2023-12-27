<?php

namespace Database\Seeders;

use App\Models\Transaksis;
use Illuminate\Database\Seeder;

class TransaksisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksis::factory()
            ->count(5)
            ->create();
    }
}
