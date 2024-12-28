<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use App\Models\DataReservasi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResepsionisController extends Controller
{
    public function index(Request $request)
{
    // $reservasis = DataReservasi::with('user')
    //     ->whereHas('user', function ($query) {
    //         $query->where('level', 'user'); // level tamu
    //     });

    // if ($request->has('search') && !empty($request->search)) {
    //     $search = $request->search;

    //     // Filter pencarian berdasarkan nama user
    //     $reservasis->whereHas('user', function ($query) use ($search) {
    //         $query->where('name', 'LIKE', '%' . $search . '%');
    //     });
    // }

    // $reservasis = $reservasis->get();

    // return view('content.resepsionis.data_reservasi_index', compact('reservasis', 'request'));
}

}
