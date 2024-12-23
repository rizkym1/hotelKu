<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTamu extends Model
{
     // Tentukan nama tabel (opsional jika sama dengan nama model)
  protected $table = 'users';

  // Kolom yang dapat diisi secara massal
  protected $fillable = ['name', 'email', 'no_telp', 'username', 'password', 'level'];
}
