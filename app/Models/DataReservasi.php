<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataReservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasis'; 
    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

}
