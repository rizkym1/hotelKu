@extends('layouts.app_modern', ['title' => 'Edit Data Fasilitas Umum'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Edit Data Resepsionis</h3>
            <form action="{{ route('admin.data-resepsionis.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <div class="form-group mb-3">
                    <label for="foto">Foto Kamar</label>
                    <input id="foto" class="form-control @error('foto') is-invalid @enderror" type="file"
                        name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{ asset('storage/' . $kamar->foto) }}" alt="Foto Kamar" class="img-thumbnail mt-2"
                        style="width: 100px">
                </div> --}}
                <div class="form-group mb-3">
                  <label for="name">Nama Lengkap</label>
                  <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                      name="name" value="{{ old('name') ?? $users->name }}">
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
              <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input id="email" class="form-control @error('email') is-invalid @enderror" type="text"
                      name="email" value="{{ old('email') ?? $users->email }}">
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              </div><div class="form-group mb-3">
                <label for="no_telp">Username</label>
                <input id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" type="text"
                    name="no_telp" value="{{ old('no_telp') ?? $users->no_telp }}">
                <span class="text-danger">{{ $errors->first('no_telp') }}</span>
            </div><div class="form-group mb-3">
                  <label for="password">Password</label>
                  <input id="password" class="form-control @error('password') is-invalid @enderror" type="text"
                      name="password" value="{{ old('password') ?? $users->password }}">
                  <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
