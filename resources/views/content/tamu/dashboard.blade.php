<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HotelKu</title>
    
        <!-- Favicon -->
        {{-- <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --}}
        <!-- Jika menggunakan PNG -->
        <link rel="icon" href="{{ asset('assets/img/hotel.png') }}" type="image/png">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- AOS CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ time() }}">
    </head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container position-relative">
            <a class="navbar-brand fw-bold" href="#">HotelKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Center Menu -->
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.kamar.user') }}">Kamar</a>
                    </li>
                </ul>
                <!-- Right Menu -->
                <ul class="navbar-nav ms-auto nav-kanan fw-bold">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $user->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-scroll" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.reservasi.index') }}">Reservasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 mb-4">Selamat Datang</h1>
                    <p class="lead mb-4">Di website resmi Official HotelKu. Nikmati diskon dan promo yang berlimpah dihotel kami menggunakan Voucher yang ada. Booking 1 bayar 1 Booking 2 bayar 2. Hari Sabtu Gratis tapi kami libur.</p>
                    <button class="btn btn-primary">Pesan Sekarang</button>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/hero.png') }}" alt="Hero Image" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Section -->
    <section class="reservation-section">
        <div class="container">
            <div class="reservation-card" data-aos="fade-up">
                <h2 class="text-center text-dark mb-4">Reservasi</h2>
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" class="form-control" placeholder="Check-In">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" placeholder="Check-Out">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control">
                            <option>Type Kamar</option>
                            <option>Superior</option>
                            <option>Deluxe</option>
                            <option>Suite Junior</option>
                            <option>Suite Eksekutif</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Harga">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary">Pesan</button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-image">
                        <img src="{{ asset('assets/img/about.png') }}" alt="About Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content">
                        <h2>Tentang Kami</h2>
                        <p>HotelKu adalah hotel yang berdiri sejak tidak kebagian kursi yang terletak di pusat kota Banjar. Hotel ini merupakan hotel bintang tiga yang berlokasi strategis di pusat kota Banjar. Lokasi yang sempurna dan akses mudah ke daerah wisata membuat pengunjung dapat sambil bekerja dan berlibur. Hotel ini memiliki total 20 kamar yang terdiri atas 7 Kamar Superior, 45 Kamar Deluxe, 4 Suite Junior, dan 2 Suite Eksekutif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Kontak Kami</h2>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>Alamat</h4>
                            <p>Jl. HotelKu No. 123, Kota Banjar</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <h4>Telepon</h4>
                            <p>+62 123 4567 8900</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <h4>Email</h4>
                            <p>info@hotelku.com</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Minggu: 24 Jam<br>
                            Check-in: 14:00<br>
                            Check-out: 12:00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2704589065347!2d108.53324571477586!3d-7.3716899947267375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f6123e6ce7edf%3A0x5e73b31e2e1e790!2sBanjar%2C%20Kota%20Banjar%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1630915371234!5m2!1sid!2sid"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; Copyright 2024 Rizkym</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>