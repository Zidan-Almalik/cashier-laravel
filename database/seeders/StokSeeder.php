<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stok::factory()
            ->count(5)
            ->create();
    }
}
