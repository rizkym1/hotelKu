<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HotelKu - Kamar</title>
    
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
    
        <style>
            body {
                padding-top: 100px;
            }
        </style>
    </head>
    
<body>
    <!-- Updated Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container position-relative">
            <a class="navbar-brand fw-bold" href="{{ route('index') }}">HotelKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Center Menu -->
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kamar">Kamar</a>
                    </li>
                </ul>
                <!-- Right Menu -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Room Types Section -->
    <div class="container" id="kamar">
      <h2 class="section-title" data-aos="fade-up">Pilih Tipe Kamar Sesuai keinginan Anda</h2>
      <div class="row">
          <!-- Standard Room -->
          @foreach ($kamars as $item)
              
          
          <div class="col-md-6 col-lg-3" data-aos="fade-up">
              <div class="card room-card">
                  <img src="{{ asset('storage/' . $item->foto) }}" alt="Standard Room" class="room-img">
                  <div class="card-body">
                      <h5 class="card-title">{{ $item->tipe_kamar }}</h5>
                      <ul class="">
                        @foreach (explode(',', $item->fasilitas) as $fas)
                          <li>{{ $fas }}</li>
                          @endforeach
                      </ul>
                      <a href="{{ route('login') }}" class="btn btn-pesan">Pesan Sekarang</a>
                  </div>
              </div>
          </div>
          @endforeach

      <!-- Facilities Section -->
      <h2 class="section-title" data-aos="fade-up">Fasilitas Yang Kami Tawarkan</h2>
      <div class="row">
          <!-- Bathroom -->
         @foreach ($fasilitas_umums as $item)
          <div class="col-md-6 col-lg-3" data-aos="fade-up">
              <div class="card facility-card">
                  <img src="{{ asset('storage/' . $item->foto) }}" alt="Kamar Mandi" class="facility-img">
                  <h5>{{ $item->fasilitas }}</h5>
                  <ul class="list-unstyled">
                    @foreach (explode(',', $item->keterangan) as $ket)
                          <li>{{ $ket }}</li>
                          @endforeach
                  </ul>
              </div>
          </div>
          @endforeach
      </div>
  </div>

  <!-- Footer -->
  <!-- Footer -->
  <footer>
    <div class="container">
        <p class="mb-0">&copy; Copyright 2024 Rizkym</p>
    </div>
</footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Added navbar scroll effect
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