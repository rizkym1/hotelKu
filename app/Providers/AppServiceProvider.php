<?php

namespace App\Providers;

use App\Models\DataReservasi;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
            // Menghitung jumlah tamu dengan level 'tamu'
        // $totalTamu = User::where('level', 'user')->count();
        // $totalAdmin = User::where('level', 'admin')->count();
        // $totalKamar = Kamar::count();
        // $totalResepsionis = User::where('level', 'resepsionis')->count();
        
        View::composer('*', function ($view) {
            $data = [
                'totalTamu' => User::where('level', 'user')->count(),
                'totalAdmin' => User::where('level', 'admin')->count(),
                'totalKamar' => Kamar::count(),
                'totalResepsionis' => User::where('level', 'resepsionis')->count()
            ];

            return $view->with('data', $data);
        });

        View::composer('*', function ($view) {
            $item = [
                'totalTamu' => User::where('level', 'user')->count(),
                'totalCheck_in' => DataReservasi::count(),
                'totalCheck_out' => DataReservasi::count()
            ];

            return $view->with('item', $item);
        });
    }
}
