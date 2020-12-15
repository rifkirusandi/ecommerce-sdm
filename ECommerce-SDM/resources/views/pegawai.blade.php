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

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="cont-1">
          <img src="{{ asset('img/left-arrow.png') }}" alt="" class="arrow" onclick="back()">
          <p class="p1">Data Pegawai</p><hr>
          <div class="cont-2" onclick="tambah()">
            + Tambah Pegawai
          </div><br>
                <div class="links">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td scope="col">ID Pegawai</td>
                        <td scope="col">Nama</td>
                        <td scope="col">Umur</td>
                        <td scope="col">Alamat</td>
                        <td scope="col">Divisi</td>
                        <td scope="col">Jabatan</td>
                      </tr>
                    </thead>
                    <tbody class="tbody">
                      @foreach ($data as $item)
                      <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['nama'] ?></td>
                        <td><?php echo $item['umur'] ?></td>
                        <td><?php echo $item['alamat'] ?></td>
                        <td><?php echo $item['divisi'] ?></td>
                        <td><?php echo $item['jabatan'] ?></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="pagination-container">
                    <nav>
                      <ul class="pagination">

                      </ul>
                    </nav>
                  </div>
                </div><br>
            </div>
        </div>
        @endsection
    </body>
</html>

<script type="text/javascript">
  function tambah(){
    window.location.href = "{{ url('tambahPegawai') }}";
  }

  function back(){
    window.location.href = "{{ route('home') }}";
  }
</script>
