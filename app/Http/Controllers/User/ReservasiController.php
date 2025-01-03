<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Reservasis;
use App\Models\TipeKamar; // Asumsikan model untuk tabel `kamars`
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil user yang sedang login
    $user = Auth::user();

    // Ambil reservasi terakhir milik user
    $reservasi = Reservasis::where('user_id', $user->id)->latest()->first();

    // Jika tidak ada reservasi, kirim pesan ke view
    $message = $reservasi ? null : 'Anda belum memiliki reservasi.';

    // Tampilkan halaman reservasi
    return view('content.tamu.reservasi_user', compact('reservasi', 'user', 'message'));
}

public function cetakReservasi($id)
{
    // Ambil data reservasi berdasarkan ID
    $reservasi = Reservasis::with('user')->findOrFail($id);

    // Generate PDF menggunakan view khusus
    $pdf = Pdf::loadView('content.tamu.cetak', compact('reservasi'))
    ->setPaper([0, 0, 450, 600], 'portrait');
    // Unduh file PDF
    return $pdf->stream('Reservasi-' . $reservasi->id . '.pdf');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'tipe_kamar' => 'required|string',
        'check_in' => 'required|date|after_or_equal:today', // pastikan tanggal check-in tidak di masa lalu
        'check_out' => 'required|date|after:check_in', // pastikan tanggal check-out setelah tanggal check-in
        'lama_inap' => 'required|string',
        'harga' => 'required',
        'jumlah_kamar' => 'required|numeric|min:1', // pastikan jumlah kamar minimal 1
        'total_bayar' => 'required',
        'alamat' => 'required|string',
    ]);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Cek apakah user sudah memiliki reservasi aktif
    $existingReservation = Reservasis::where('user_id', $user->id)
        ->whereIn('status', ['diproses', 'dikonfirmasi'])
        ->first();

    if ($existingReservation) {
        // Jika sudah ada reservasi aktif, kembalikan pesan error
        return redirect()
            ->back()
            ->with('error', 'Anda sudah memiliki reservasi aktif. Tidak bisa melakukan booking lagi sebelum reservasi sebelumnya selesai.');
    }

    // Ambil data kamar berdasarkan tipe kamar yang dipilih
    $room = Kamar::where('tipe_kamar', $request->tipe_kamar)->first();

    if (!$room) {
        return redirect()->back()->with('error', 'Tipe kamar tidak ditemukan.');
    }

    // Cek apakah jumlah kamar yang tersedia mencukupi
    if ($room->stok_kamar < $request->jumlah_kamar) {
        return redirect()->back()->with('error', 'Jumlah kamar yang tersedia tidak mencukupi untuk permintaan Anda.');
    }

    // Membersihkan nilai harga dan total bayar dari karakter selain angka
    $harga = (int) preg_replace('/[^0-9]/', '', $request->harga);
    $total_bayar = (int) preg_replace('/[^0-9]/', '', $request->total_bayar);

    // Kurangi stok kamar yang tersedia
    $room->stok_kamar -= $request->jumlah_kamar;
    $room->save();

    // Buat reservasi baru
    $reservasi = new Reservasis();
    $reservasi->user_id = $user->id;
    $reservasi->alamat = $request->alamat;
    $reservasi->tipe_kamar = $request->tipe_kamar;
    $reservasi->check_in = $request->check_in;
    $reservasi->check_out = $request->check_out;
    $reservasi->lama_inap = $request->lama_inap;
    $reservasi->harga = $harga;
    $reservasi->jumlah_kamar = $request->jumlah_kamar;
    $reservasi->total_bayar = $total_bayar;
    $reservasi->status = 'diproses';

    // Simpan reservasi ke database
    $reservasi->save();

    // Redirect ke halaman reservasi dengan pesan sukses
    return redirect()
        ->route('user.reservasi.index')
        ->with('success', 'Reservasi berhasil dibuat!');
}

}
