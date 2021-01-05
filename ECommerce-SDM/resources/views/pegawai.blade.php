@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>


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
                        <td scope="col" colspan="2">Operation</td>
                      </tr>
                    </thead>
                    <tbody class="tbody">
                      @foreach ($data as $item)
                      <tr id="mytable">
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['nama'] ?></td>
                        <td><?php echo $item['umur'] ?></td>
                        <td><?php echo $item['alamat'] ?></td>
                        <td><?php echo $item['divisi'] ?></td>
                        <td><?php echo $item['jabatan'] ?></td>
                        <td><a href="/editPegawai/{{$item['id']}}" class="btn btn-success">Edit</a></input></td>
                        <td><a href="/deletePegawai/{{$item['id']}}" class="btn btn-danger">Hapus</a></td>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center mt-2">
                      <ul class="pagination"></ul>
                  </div>
                </div><br>
            </div>
        </div>
        @endsection
    </body>
</html>

<script>
  function tambah(){
    window.location.href = "{{ url('tambahPegawai') }}";
  }

  function back(){
    window.location.href = "{{ route('home') }}";
  }



  $(document).ready( function () {
    $('#mytable').DataTable();
  } );
</script>
