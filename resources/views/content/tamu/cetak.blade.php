<!DOCTYPE html>
<html>
<head>
    <title>Struk Reservasi Hotel</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 30px;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .header img {
            width: 80px;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .content {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        /* th, td {
            padding: 8px 10px;
            font-size: 14px;
        } */

        th {
            text-align: left;
            width: 35%;
            background-color: #f5f5f5;
        }

        td {
            text-align: left;
        }

        .important {
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }

        .footer hr {
            border: 0;
            border-top: 1px dashed #aaa;
            margin: 15px 0;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>HotelKu</h1>
        <p>Jl. HotelKu No. 123, Kota Banjar</p>
        <p>Tel: +62 123 4567 8900 | Email: info@hotelku.com</p>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 style="text-align: center;">Struk Reservasi</h2>
        <p><strong>Reservasi ID:</strong> {{ $reservasi->id }}</p>
        <table>
            <tr>
                <th>Tipe Kamar</th>
                <td>{{ $reservasi->tipe_kamar }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ $reservasi->harga }}</td>
            </tr>
            <tr>
                <th>Jumlah Kamar</th>
                <td>{{ $reservasi->jumlah_kamar }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $reservasi->user->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $reservasi->user->email }}</td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $reservasi->user->name }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $reservasi->alamat}}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $reservasi->user->no_telp }}</td>
            </tr>
            
            <tr>
                <th>Check In</th>
                <td>{{ $reservasi->check_in }}</td>
            </tr>
            <tr>
                <th>Check Out</th>
                <td>{{ $reservasi->check_out }}</td>
            </tr>
            <tr>
                <th>Lama Inap</th>
                <td>{{ $reservasi->lama_inap }} malam</td>
            </tr>
            <tr>
                <th>Total Biaya</th>
                <td class="important">Rp. {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
            </tr>
            {{-- <tr>
                <th>Status</th>
                <td>{{ ucfirst($reservasi->status) }}</td>
            </tr> --}}
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <hr>
        <p>Terima kasih telah memilih HotelKu.</p>
        <p>Jika ada pertanyaan, hubungi kami di kontak yang tertera di atas.</p>
        <p><em>Semoga Anda menikmati pengalaman menginap bersama kami.</em></p>
    </div>
</body>
</html>
