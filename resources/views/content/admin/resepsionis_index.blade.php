@extends('layouts.app_modern', ['title' => 'Data Fasilitas Umum'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Fasilitas Umum</h3>
            <a href="{{ route('admin.fasilitas-umum.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->fasilitas }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/admin/fasilitas-umum/{{ $item->id }}/edit" class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="/admin/fasilitas-umum/{{ $item->id }}" method="POST" class="d-inline">
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
            {!! $users->Links() !!}
        </div>
    </div>
@endsection
