<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
