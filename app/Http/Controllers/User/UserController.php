<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FasilitasUmum;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
        // Filter data dengan level 'admin'
    $user = Auth::user();

    // Kirim data admin ke view
    return view('content.tamu.dashboard', compact('user'));
    }

    public function kamar()
    {
        $user = Auth::user();
        // Ambil data dari tabel 'kamars'
        $kamars = Kamar::all();

        // Ambil data dari tabel 'fasilitas_umums'
        $fasilitas_umums = FasilitasUmum::all();

        // Kirim data ke view
        return view('content.tamu.kamar_user', compact('kamars', 'fasilitas_umums', 'user'));
    }
}
