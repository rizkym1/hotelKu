<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataReservasi; // Pastikan model DataReservasi ada

class DataReservasiSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data acak menggunakan factory
        DataReservasi::factory(10)->create();
    }
}
