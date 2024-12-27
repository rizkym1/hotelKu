<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTamu extends Model
{
  use HasFactory;
     // Tentukan nama tabel (opsional jika sama dengan nama model)
  protected $table = 'users';

  // Kolom yang dapat diisi secara massal
  protected $fillable = ['name', 'email', 'no_telp', 'username', 'password', 'level'];
}
