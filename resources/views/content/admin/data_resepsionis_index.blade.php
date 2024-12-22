@extends('layouts.app_modern', ['title' => 'Data Resepsionis'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Resepsionis</h3>
            <a href="{{ route('admin.data-resepsionis.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                <a href="/admin/resepsionis/{{ $item->id }}/edit" class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="/admin/data-resepsionis/{{ $item->id }}" method="POST" class="d-inline">
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
            {{-- {!! $users->Links() !!} --}}
        </div>
    </div>
@endsection
