<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiDetail;

class TransaksiDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiDetail::factory()
            ->count(5)
            ->create();
    }
}
