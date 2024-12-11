@extends('layouts.app2_modern', ['title' => 'Edit Data Fasilitas Umum'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Edit Data Fasilitas Umum</h3>
            <form action="{{ route('admin.fasilitas-umum.update', $fasilitas_umum->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="fasilitas">Fasilitas</label>
                    <input id="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" type="text"
                        name="fasilitas" value="{{ old('fasilitas') ?? $fasilitas_umum->fasilitas }}">
                    <span class="text-danger">{{ $errors->first('fasilitas') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" type="text"
                        name="keterangan" value="{{ old('keterangan') ?? $fasilitas_umum->keterangan }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
