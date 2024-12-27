<?php

namespace Database\Factories;

use App\Models\DataReservasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataReservasiFactory extends Factory
{
    protected $model = DataReservasi::class; // Hubungkan factory ke model DataReservasi

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // ID user acak
            'check_in' => $this->faker->date(),
            'check_out' => $this->faker->date(),
            'tipe_kamar' => $this->faker->word(),
            'harga' => $this->faker->randomFloat(2, 100, 500),
            'jumlah_kamar' => $this->faker->numberBetween(1, 5),
            'alamat' => $this->faker->address(),
            'total_bayar' => $this->faker->randomFloat(2, 500, 2500),
            'lama_inap' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['diproses', 'dikonfirmasi', 'dibatalkan']),
        ];
    }
}
