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
    public function index(Request $request)
    {
        $reservasis = DataReservasi::with('user')
        ->whereHas('user', function ($query) {
            $query->where('level', 'user'); // level tamu
        });

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;

        // Filter pencarian berdasarkan nama user
        $reservasis->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }

    $reservasis = $reservasis->get();

    return view('content.resepsionis.data_reservasi_index', compact('reservasis', 'request'));
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
    public function show($id)
    {
        // Ambil data reservasi berdasarkan ID
        $reservasi = DataReservasi::with('user')->findOrFail($id);

        // Kirim data ke view
        return view('content.resepsionis.detail_data_reservasi_index', compact('reservasi'));
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
