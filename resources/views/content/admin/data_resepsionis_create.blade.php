@extends('layouts.app_modern', ['title' => 'Tambah Data Fasilitas'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Form Data Resepsionis</h3>
            <form action="{{ route('admin.data-resepsionis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group mb-3">
                    <label for="foto">Foto Kamar</label>
                    <input id="foto" class="form-control @error('foto') is-invalid @enderror" type="file"
                        name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div> --}}
                <div class="form-group mb-3">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                        name="name" value="{{ old('name') }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="text"
                        name="email" value="{{ old('email') }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="username">Username</label>
                  <input id="username" class="form-control @error('username') is-invalid @enderror" type="text"
                      name="username" value="{{ old('username') }}">
                  <span class="text-danger">{{ $errors->first('username') }}</span>
              </div>
              <div class="form-group mb-3">
                <label for="no_telp">No Telepon</label>
                <input type="number" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" type="text"
                    name="no_telp" value="{{ old('no_telp') }}">
                <span class="text-danger">{{ $errors->first('no_telp') }}</span>
            </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" type="text"
                    name="password" value="{{ old('password') }}">
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
