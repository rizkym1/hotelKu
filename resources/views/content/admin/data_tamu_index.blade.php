@extends('layouts.app_modern', ['title' => 'Data Tamu'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Tamu</h3>
            {{-- <a href="#" class="btn btn-primary">Tambah Data</a> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="d-flex align-items-center">
                                <a href="#" class="btn btn-info btn-sm me-2">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $fasilitas_umum->Links() !!} --}}
        </div>
    </div>
@endsection
