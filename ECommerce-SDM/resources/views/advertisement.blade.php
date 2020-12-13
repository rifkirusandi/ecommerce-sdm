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
    <div class="cont-1-sales">
      <p class="p1">Create Advertisement</p>
      <div class="card-body">
        <form class="" action="https://eai-sales.herokuapp.com/api/advertisement/create" method="post"><hr><br>
          @csrf
          <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>

              <div class="col-md-6">
                  <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

              <div class="col-md-6">
                  <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">
              </div>
          </div>

          <div class="form-group row">
              <label for="platform" class="col-md-4 col-form-label text-md-right">{{ __('Platform') }}</label>

              <div class="col-md-6">
                  <input id="platform" type="text" class="form-control @error('name') is-invalid @enderror" name="platform" value="{{ old('platform') }}" required autocomplete="platform">
              </div>
          </div>

          <div class="form-group row">
              <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Durasi') }}</label>

              <div class="col-md-6">
                  <input id="duration" type="text" class="form-control @error('name') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="duration">
              </div>
          </div>

          <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Biaya') }}</label>

              <div class="col-md-6">
                  <input id="price" type="number" class="form-control @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">
              </div>
          </div>

          <div class="button-tambah">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary" onclick="berhasil()">
                      {{ __('Create') }}
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
