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
      Tambah Penggajian
      <div class="card-body">
        <form class="" action="http://divisi-sdm.herokuapp.com/api/penggajian" method="post"><br><br>
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID Pegawai') }}</label>

              <div class="col-md-6">
                  <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="id_pegawai" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="umur" class="col-md-4 col-form-label text-md-right">{{ __('Jam Kerja') }}</label>

              <div class="col-md-6">
                  <input id="umur" type="number" class="form-control @error('name') is-invalid @enderror" name="jam_kerja" value="{{ old('umur') }}" required autocomplete="umur">
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
      alert("Data berhasil ditambahkan");
      window.location.href = "{{ url('pegawai') }}";
    }
</script>
