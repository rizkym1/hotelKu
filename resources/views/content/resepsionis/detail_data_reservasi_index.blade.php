@extends('layouts.app2_modern', ['title' => 'Detail Reservasi'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Detail Reservasi</h3>
            <div class="card mb-0">
              <div class="card-body">
                <form>
                  <fieldset disabled>
                    <div class="row">
                      <label for="tipe_kamar" class="col-md-3 col-form-label">Tipe Kamar</label>
                      <div class="col-md-9">
                        <input type="text" id="tipe_kamar" class="form-control" value="{{ $reservasi->tipe_kamar }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="harga" class="col-md-3 col-form-label">Harga</label>
                      <div class="col-md-9">
                        <input type="text" id="harga" class="form-control" value="{{ $reservasi->harga }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="jumlah_kamar" class="col-md-3 col-form-label">Jumlah Kamar</label>
                      <div class="col-md-9">
                        <input type="text" id="jumlah_kamar" class="form-control" value="{{ $reservasi->jumlah_kamar }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="username" class="col-md-3 col-form-label">Username</label>
                      <div class="col-md-9">
                        <input type="text" id="username" class="form-control" value="{{ $reservasi->user->username }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <input type="text" id="email" class="form-control" value="{{ $reservasi->user->email }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="name" class="col-md-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-9">
                        <input type="text" id="name" class="form-control" value="{{ $reservasi->user->name }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="alamat" class="col-md-3 col-form-label">Alamat</label>
                      <div class="col-md-9">
                        <textarea id="alamat" rows="3" class="form-control">{{ $reservasi->alamat }}</textarea>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="no_telp" class="col-md-3 col-form-label">No Telepon</label>
                      <div class="col-md-9">
                        <input type="text" id="no_telp" class="form-control" value="{{ $reservasi->user->no_telp }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="check_in" class="col-md-3 col-form-label">Check In</label>
                      <div class="col-md-9">
                        <input type="text" id="check_in" class="form-control" value="{{ $reservasi->check_in }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="check_out" class="col-md-3 col-form-label">Check Out</label>
                      <div class="col-md-9">
                        <input type="text" id="check_out" class="form-control" value="{{ $reservasi->check_out }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="lama_inap" class="col-md-3 col-form-label">Lama Inap</label>
                      <div class="col-md-9">
                        <input type="text" id="lama_inap" class="form-control" value="{{ $reservasi->lama_inap }}">
                      </div>
                    </div>
                  </fieldset>
                  <fieldset disabled>
                    <div class="row">
                      <label for="total_bayar" class="col-md-3 col-form-label">Total Biaya</label>
                      <div class="col-md-9">
                        <input type="text" id="total_bayar" class="form-control" value="{{ $reservasi->total_bayar }}">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
            <a href="{{ route('resepsionis.data-reservasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
