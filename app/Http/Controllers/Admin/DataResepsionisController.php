<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataResepsionis;
use App\Models\User;
use Illuminate\Http\Request;

class DataResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('name', 'no_telp', 'email')
        ->where('level', 'resepsionis') // Filter data berdasarkan level
        ->get();

    return view('content.admin.data_resepsionis_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.data_resepsionis_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data input dari request
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username|max:255',
            'no_telp' => 'required|numeric', // Kolom nomor telepon wajib diisi dan harus berupa angka
            'password' => 'required|string|min:8|', // Memastikan password dan konfirmasi password sama
            
        ]);

        // Simpan data ke tabel `resepsionis`
        DataResepsionis::create([
            'name' => $validatedData['name'], // Data nama diambil dari input yang sudah divalidasi
            'email' => $validatedData['email'], // Data email diambil dari input yang sudah divalidasi
            'username' => $validatedData['username'], // Data email diambil dari input yang sudah divalidasi
            'no_telp' => $validatedData['no_telp'], // Data nomor telepon diambil dari input yang sudah divalidasi
            'password' => $validatedData['password'], // Data nomor telepon diambil dari input yang sudah divalidasi
            'level' => 'resepsionis', // Level default sebagai resepsionis
        ]);

        // Redirect ke halaman daftar resepsionis dengan pesan sukses
        flash('Data Berhasil Ditambahkan')->success();
        return redirect()->route('admin.data-resepsionis.index');
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
