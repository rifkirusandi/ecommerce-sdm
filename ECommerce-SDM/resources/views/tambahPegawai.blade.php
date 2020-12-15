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
      <img src="{{ asset('img/left-arrow.png') }}" alt="" class="arrow" onclick="back()">
      <p class="p1">Tambah Pegawai</p>
      <div class="card-body">
        <form class="" action="{{route('createPegawai')}}" method="post"><hr><br>
          @csrf
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="umur" class="col-md-4 col-form-label text-md-right">{{ __('Umur') }}</label>

              <div class="col-md-6">
                  <input id="umur" type="number" class="form-control @error('name') is-invalid @enderror" name="umur" value="{{ old('umur') }}" required autocomplete="umur">
              </div>
          </div>

          <div class="form-group row">
              <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

              <div class="col-md-6">
                  <textarea id="alamat" type="textarea" class="form-control @error('name') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"> </textarea>
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
              <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>

              <div class="col-md-6">
                <select name="role" id="role" class="form-control">
                  <option value="">Pilih Jabatan</option>
                  <option value="Manager">Manager</option>
                  <option value="Karyawan">Karyawan</option>
                </select>
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
    }

    function back() {
      window.location.href = "{{ route('listPegawai') }}";
    }
</script>
