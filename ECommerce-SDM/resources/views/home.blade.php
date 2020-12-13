@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">{{ __('Our Feature') }}</div>

                      <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                        <center>
                          <div class="card-body1" onclick="datapegawai()"><br>
                            <center>
                              <img class="img" src="{{ asset('img/group.png') }}" alt="Picture" title="Data Pegawai"><br>
                              Data Pegawai
                            </center>
                          </div>

                          <div class="card-body2" onclick="datapenggajian()"><br>
                            <center>
                              <img class="img" src="{{ asset('img/dollar.png') }}" alt="Picture" title="Data Penggajian"><br>
                              Data Penggajian
                            </center>
                          </div>

                          <div class="card-body3" onclick="dataabsensi()"><br>
                            <center>
                              <img class="img" src="{{ asset('img/clipboard.png') }}" alt="Picture" title="Data Absensi"><br>
                              Data Absensi
                            </center>
                          </div>

                          <div class="card-body4" onclick="datafinance()"><br>
                            <center>
                              <img class="img" src="{{ asset('img/money.png') }}" alt="Picture" title="Data Absensi"><br>
                              Input Kas Keluar
                            </center>
                          </div>

                          <div class="card-body5" onclick="datasales()"><br>
                            <center>
                              <img class="img" src="{{ asset('img/bullhorn.png') }}" alt="Picture" title="Data Absensi"><br>
                              Create Advertisement
                            </center>
                          </div>
                        </center>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endsection
  </body>
</html>

<script type="text/javascript">
  function datapegawai(){
    window.location.href = "{{ url('pegawai') }}";
  }

  function datapenggajian(){
    window.location.href = "{{ url('penggajian') }}";
  }

  function dataabsensi(){
    window.location.href = "{{ url('tambahAbsensi') }}";
  }

  function datafinance(){
    window.location.href = "{{ url('kasKeluar') }}";
  }

  function datasales(){
    window.location.href = "{{ url('advertisement') }}";
  }
</script>
