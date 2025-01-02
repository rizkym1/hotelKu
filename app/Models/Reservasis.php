<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasis extends Model
{
    use HasFactory;

    protected $table = 'reservasis';

    // Kolom yang dapat diisi secara massal
    // protected $fillable = [
    //     'user_id', 'tipe_kamar', 'harga', 'jumlah_kamar', 'alamat', 
    //     'lama_inap', 'total_bayar', 'check_in', 'check_out', 'status', 
    //     'username', 'email', 'no_telp', 'name',
    // ];
    protected $fillable = [
        'user_id', 'check_in', 'check_out', 'tipe_kamar', 'lama_inap', 'harga', 'jumlah_kamar', 'alamat', 'total_bayar', 'status'
    ];
    
    

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
