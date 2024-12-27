@extends('layouts.app2_modern', ['title' => 'Data Kamar'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Reservasi</h3>
            {{-- <a href="#" class="btn btn-primary">Tambah Data</a> --}}
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
                            <td class="d-flex align-items-center">
                                <a href="{{ route('admin.kamar.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="{{ route('admin.kamar.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $reservasis->Links() !!} --}}
        </div>
    </div>
@endsection
