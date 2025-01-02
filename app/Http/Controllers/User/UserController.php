<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FasilitasUmum;
use App\Models\Kamar;
use App\Models\Reservasis;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
        // Filter data dengan level 'user'
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

    public function boking(Request $request)
{
    // Ambil data user yang sedang login
    $boking = Auth::user();

    // Ambil data kamar berdasarkan ID
    $kamar = Kamar::find($request->id);

    if (!$kamar) {
        return redirect()->back()->with('error', 'Kamar tidak ditemukan.');
    }

    // Hitung jumlah kamar yang sudah dibooking untuk tipe kamar ini
    $jumlahBooking = Reservasis::where('tipe_kamar', $kamar->tipe)->sum('jumlah_kamar');

    // Hitung jumlah kamar yang masih tersedia
    $kamarTersedia = $kamar->stok_kamar - $jumlahBooking;

    // Kirim data ke view
    return view('content.tamu.boking_user', compact('boking', 'kamar', 'kamarTersedia'));
}


// public function simpanBoking(Request $request)
// {
//     // Validasi input form
//     $request->validate([
//         'jumlah_kamar' => 'required|integer|min:1',
//         'check_in' => 'required|date',
//         'check_out' => 'required|date|after:check_in',
//         'alamat' => 'required|string',
//     ]);

//     // Ambil data kamar
//     $kamar = Kamar::find($request->id);

//     if (!$kamar) {
//         return redirect()->back()->with('error', 'Kamar tidak ditemukan.');
//     }

//     // Hitung jumlah kamar yang sudah dibooking
//     $jumlahBooking = Reservasis::where('tipe_kamar', $kamar->tipe)->sum('jumlah_kamar');

//     // Hitung jumlah kamar yang masih tersedia
//     $kamarTersedia = $kamar->stok_kamar - $jumlahBooking;

//     // Cek apakah jumlah kamar yang dipesan melebihi jumlah yang tersedia
//     if ($request->jumlah_kamar > $kamarTersedia) {
//         return redirect()->back()->with('error', 'Jumlah kamar yang dipesan melebihi jumlah yang tersedia.');
//     }

//     // Simpan data ke tabel reservasis
//     Reservasis::create([
//         'user_id' => Auth::id(), // ID pengguna yang sedang login
//         'check_in' => $request->check_in,
//         'check_out' => $request->check_out,
//         'tipe_kamar' => $kamar->tipe,
//         'harga' => $kamar->harga,
//         'jumlah_kamar' => $request->jumlah_kamar,
//         'alamat' => $request->alamat,
//         'total_bayar' => $request->jumlah_kamar * $kamar->harga,
//         'lama_inap' => (new \DateTime($request->check_out))->diff(new \DateTime($request->check_in))->days,
//         'status' => 'diproses',
//     ]);

//     // Redirect ke halaman sukses
//     return redirect()->route('boking.user')->with('success', 'Booking berhasil dilakukan.');
// }

// public function reservasi()
// {
//     // Ambil data user yang sedang login
//     $user = Auth::user();

//     // Ambil data booking dari tabel reservasis berdasarkan user_id
//     $reservasi = Reservasis::where('user_id', $user->id)->get();

//     // Kirim data ke view
//     return view('content.tamu.reservasi_user', compact('reservasi', 'user'));
// }




}
