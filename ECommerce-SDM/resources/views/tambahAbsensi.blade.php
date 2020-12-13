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
    <div class="cont-1">
      Tambah Absensi
      <div class="card-body">
        <form class="" action="http://divisi-sdm.herokuapp.com/api/absensi" method="post"><br><br>
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID Pegawai') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="id_pegawai" value="{{ old('name') }}" required autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="umur" class="col-md-4 col-form-label text-md-right">{{ __('Jam Masuk') }}</label>

              <div class="col-md-6">
                  <input id="umur" type="datetime-local" class="form-control @error('name') is-invalid @enderror" name="jam_masuk" value="{{ old('jam_masuk') }}" required>
              </div>
          </div>

          <div class="form-group row">
              <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Jam Keluar') }}</label>

              <div class="col-md-6">
                  <input id="alamat" type="datetime-local" class="form-control @error('name') is-invalid @enderror" name="jam_keluar" value="{{ old('jam_keluar') }}" required>
              </div>
          </div>

          <div class="button-tambah">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary" onclick="berhasil()">
                      {{ __('Tambah') }}
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
      window.location.href = "{{ url('home') }}";
    }
</script>
