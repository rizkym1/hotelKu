@extends('layouts.app_modern', ['title' => 'Tambah Data Fasilitas'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Form Fasilitas Umum</h3>
            <form action="{{ route('admin.fasilitas-umum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="foto">Foto Fasilitas</label>
                    <input id="foto" class="form-control @error('foto') is-invalid @enderror" type="file"
                        name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="fasilitas">Fasilitas</label>
                    <input id="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" type="text"
                        name="fasilitas" value="{{ old('fasilitas') }}">
                    <span class="text-danger">{{ $errors->first('fasilitas') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" type="text"
                        name="keterangan" value="{{ old('keterangan') }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
