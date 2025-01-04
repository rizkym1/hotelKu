<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelKu - Reservasi</title>
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
        .booking-section {
            padding: 2rem 0;
            margin-top: 5rem;
        }
        .booking-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .room-preview {
            flex: 1 1 40%;
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .room-preview img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }
        .booking-form {
            flex: 1 1 55%;
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .btn-booking {
            background-color: #0d6efd;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            float: right;
            transition: all 0.3s ease;
        }
        .btn-booking:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }
        footer {
            background-color: #0d6efd;
            color: white;
            padding: 1rem 0;
            text-align: center;
            margin-top: 3rem;
        }
        @media (max-width: 768px) {
            .booking-content {
                flex-direction: column;
            }
        }
    </style>
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

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="container">
            <h2 class="text-center mb-4">Hasil Reservasi Anda</h2>
            <p class="text-center mb-5">Berikut adalah informasi reservasi terakhir Anda.</p>
    
            <div class="booking-content">
                <!-- Booking Form -->
                <form class="booking-form" method="POST" data-aos="fade-left">
                    @csrf
                    <!-- Tampilkan pesan sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    <!-- Tampilkan pesan jika belum ada reservasi -->
                    @if ($message)
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    @endif
    
                    <!-- Jika ada reservasi, tampilkan detailnya -->
                    @if ($reservasi)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                    <input id="tipe_kamar" name="tipe_kamar" type="text" class="form-control" value="{{ $reservasi->tipe_kamar }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input id="harga" name="harga" type="text" class="form-control" value="{{ number_format($reservasi->harga, 0, ',', '.') }}" readonly>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                            <input id="jumlah_kamar" name="jumlah_kamar" type="text" class="form-control" value="{{ $reservasi->jumlah_kamar }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" name="username" type="text" class="form-control" value="{{ $reservasi->user->username ?? '-' }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" class="form-control" value="{{ $reservasi->user->email ?? '-' }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ $reservasi->user->name ?? '-' }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3" readonly>{{ $reservasi->alamat ?? '-' }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telepon</label>
                            <input id="no_telp" name="no_telp" type="tel" class="form-control" value="{{ $reservasi->user->no_telp ?? '-' }}" readonly>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_in" class="form-label">Check In</label>
                                    <input id="check_in" name="check_in" type="date" class="form-control" value="{{ $reservasi->check_in }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_out" class="form-label">Check Out</label>
                                    <input id="check_out" name="check_out" type="date" class="form-control" value="{{ $reservasi->check_out }}" readonly>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="lama_inap" class="form-label">Lama Inap</label>
                            <input id="lama_inap" name="lama_inap" type="text" class="form-control" value="{{ $reservasi->lama_inap }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="total_biaya" class="form-label">Total Biaya</label>
                            <input id="total_biaya" name="total_biaya" type="text" class="form-control" value="{{ number_format($reservasi->total_bayar, 0, ',', '.') }}" readonly>
                        </div>
                        <a href="{{ route('reservasi.cetak', $reservasi->id) }}" class="btn btn-primary btn-block">Cetak Hasil Reservasi</a>
                    @else
                        <!-- Jika tidak ada reservasi -->
                        <div class="alert alert-info">
                            Anda belum melakukan reservasi. Silakan buat reservasi terlebih dahulu.
                        </div>
                    @endif
                </form>
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
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
