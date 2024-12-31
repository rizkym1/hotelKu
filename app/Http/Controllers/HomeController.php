<?php

namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\Kamar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index'); // Pastikan view 'index.blade.php' tersedia
    }

    public function kamar()
    {
        // Ambil data dari tabel 'kamars'
        $kamars = Kamar::all();

        // Ambil data dari tabel 'fasilitas_umums'
        $fasilitas_umums = FasilitasUmum::all();

        // Kirim data ke view
        return view('kamar', compact('kamars', 'fasilitas_umums'));
    }

    
}
