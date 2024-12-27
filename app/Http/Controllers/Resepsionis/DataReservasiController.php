<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\DataReservasi;
use Illuminate\Http\Request;

class DataReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil data reservasi beserta data user (tamu) dengan eager loading
        $reservasis = DataReservasi::with('user') // Mengambil data user yang terkait
        ->whereHas('user', function ($query) {
            // Filter data user berdasarkan level "tamu"
            $query->where('level', 'user');
        })
        ->get(); // Ambil semua data reservasi

    // Kirim data ke view
    return view('content.resepsionis.data_reservasi_index', compact('reservasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
