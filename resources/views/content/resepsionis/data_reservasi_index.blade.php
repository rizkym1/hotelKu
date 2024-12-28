@extends('layouts.app2_modern', ['title' => 'Data Kamar'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Reservasi</h3>
            {{-- <a href="#" class="btn btn-primary">Tambah Data</a> --}}
            <form method="GET" action="{{ route('resepsionis.data-reservasi.index') }}">
                <div class="mb-3">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari nama tamu" 
                        value="{{ request('search') }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            
            @if ($reservasis->isEmpty())
                <p class="text-muted">Data tidak ditemukan.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>No Telepon</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->user->no_telp }}</td>
                                <td>{{ $item->check_in }}</td>
                                <td>{{ $item->check_out }}</td>
                                <td>
                                    <a href="{{ route('resepsionis.data-reservasi.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
            {{-- {!! $reservasis->Links() !!} --}}
        </div>
    </div>
@endsection
