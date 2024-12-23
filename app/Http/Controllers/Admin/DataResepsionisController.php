<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataResepsionis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resepsionis = DataResepsionis::where('level', 'resepsionis')->get(); // Pastikan mendapatkan data yang benar
    return view('content.admin.data_resepsionis_index', compact('resepsionis'));
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
        $data['users'] = \App\Models\DataResepsionis::findOrFail($id);
        return view('content.admin.data_resepsionis_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Email unik kecuali untuk data ini
            'no_telp' => 'required|numeric',
            'password' => 'nullable|string|min:8', // Password opsional
        ]);

        $users = DataResepsionis::findOrFail($id); // Cari data berdasarkan ID

        // Update data
        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
        $users->no_telp = $validatedData['no_telp'];

        // Jika password diisi, hash dan update
        if (!empty($validatedData['password'])) {
            $users->password = Hash::make($validatedData['password']);
        }

        $users->save(); // Simpan perubahan

        flash('Data Berhasil Di Update')->success();
        return redirect()->route('admin.data-resepsionis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = \App\Models\DataResepsionis::findOrFail($id);
        $kamar->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
