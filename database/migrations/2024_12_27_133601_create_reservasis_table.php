<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('tipe_kamar');
            $table->string('harga');
            $table->string('jumlah_kamar');
            $table->text('alamat');
            $table->string('total_bayar');
            $table->string('lama_inap');  
            $table->enum('status', ['diproses', 'dikonfirmasi', 'dibatalkan'])->default('diproses');  
            $table->timestamps();

             // Definisi foreign key
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
