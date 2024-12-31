<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['fasilitas_umum']  = \App\Models\FasilitasUmum::latest()->paginate(5);
        return view('content.admin.fasilitas_umum_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.fasilitas_umum_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'fasilitas' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2000',
        ]);

         // Upload foto
         if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('uploads/fasilitas', 'public'); // Menyimpan ke storage/app/public/uploads/kamar
            $requestData['foto'] = $path; // Menyimpan path foto ke array $requestData
        }

        $kamar = new \App\Models\FasilitasUmum();
        $kamar->fill($requestData);
        $kamar->save();

        flash('Data Berhasil Ditambahkan')->success();
        return redirect()->route('admin.fasilitas-umum.index');
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
        $data['fasilitas_umum'] = \App\Models\FasilitasUmum::findOrFail($id);
        return view('content.admin.fasilitas_umum_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'fasilitas' => 'required',
            'keterangan' => 'required',
        ]);

        $kamar = \App\Models\FasilitasUmum::findOrFail($id);
        $kamar->update($requestData);

        flash('Data Berhasil Diupdate')->success();
        return redirect()->route('admin.fasilitas-umum.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = \App\Models\FasilitasUmum::findOrFail($id);
        $kamar->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
