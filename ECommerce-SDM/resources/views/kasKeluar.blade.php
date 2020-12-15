@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  </head>
  <body>
    <div class="cont-1-finance">
      <img src="{{ asset('img/left-arrow.png') }}" alt="" class="arrow" onclick="back()">
      <p class="p1">Input Kas Keluar</p>
      <div class="card-body">
        <form class="" action="{{route('inputKasKeluar')}}" method="post"><hr><br>
          @csrf
          <div class="form-group row">
              <label for="id_transaksi" class="col-md-4 col-form-label text-md-right">{{ __('ID Transaksi') }}</label>

              <div class="col-md-6">
                  <input id="id_transaksi" type="number" class="form-control @error('name') is-invalid @enderror" name="transaksi_id" value="{{ old('transaksi_id') }}" required autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="pegawai_id" class="col-md-4 col-form-label text-md-right">{{ __('ID Pegawai') }}</label>

              <div class="col-md-6">
                  <input id="pegawai_id" type="number" class="form-control @error('name') is-invalid @enderror" name="pegawai_id" value="{{ old('pegawai_id') }}" required>
              </div>
          </div>

          <div class="form-group row">
              <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

              <div class="col-md-6">
                <select name="role" id="role" class="form-control">
                  <option value="penggajian">Penggajian</option>
                </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

              <div class="col-md-6">
                  <input id="nama" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">
              </div>
          </div>

          <div class="form-group row">
              <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>

              <div class="col-md-6">
                  <input id="keterangan" type="text" class="form-control @error('name') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan">
              </div>
          </div>

          <div class="form-group row">
              <label for="divisi" class="col-md-4 col-form-label text-md-right">{{ __('Divisi') }}</label>

              <div class="col-md-6">
                <select name="role" id="role" class="form-control">
                  <option value="">Pilih Divisi</option>
                  <option value="SDM">SDM</option>
                  <option value="Finance">Finance</option>
                  <option value="Sales">Sales</option>
                  <option value="warehouse">Warehouse</option>
                </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="biaya" class="col-md-4 col-form-label text-md-right">{{ __('Biaya') }}</label>

              <div class="col-md-6">
                  <input id="biaya" type="text" class="form-control @error('name') is-invalid @enderror" name="biaya" value="{{ old('biaya') }}" required autocomplete="biaya">
              </div>
          </div>

          <div class="button-tambah">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary" onclick="berhasil()">
                      {{ __('Submit') }}
                  </button>
              </div>
          </div>
        </form>
      </div>
      </div>
    @endsection
  </body>
</html>

<script type="text/javascript">
    function berhasil() {
      alert("Data berhasil ditambahkan");
    }

    function back(){
      window.location.href = "{{ route('home') }}";
    }
</script>
