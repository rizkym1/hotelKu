<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Secara eksplisit menyebutkan nama tabel jika tidak sesuai default
    protected $table = 'kamars'; // Hanya jika nama tabel tidak sesuai dengan konvensi Laravel

    public function reservasis()
{
    return $this->hasMany(Reservasis::class, 'id'); // Pastikan 'kamar_id' adalah foreign key di tabel reservasis
}

}


