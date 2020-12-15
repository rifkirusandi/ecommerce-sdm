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
          <h6 style="margin-right: 530px;color: #000;">Select Number of Rows</h6>
            <select class="form-control" id="maxRows" name="state" style="width:150px;margin-left: 180px;">
              <option value="5000">Show All</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select><br>
                <div class="links">
                  <table id="mytable" class="table table-striped">
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

  var table = '#mytable';
  $('#maxRows').on('change', function(){
    $('.pagination').html('');
    var trnum = 0;
    var maxRows = parseInt($(this).val());
    var totalRows = $(table+'tbody tr').length;
    $(table+' tr:gt(0)').each(function(){
      trnum++;
      if(trnum > maxRows){
        $(this).hide();
      }
      if (trnum <= maxRows) {
        $(this).show();
      }
    })
    if (totalRows > maxRows) {
      var pagenum = Math.ceil(totalRows/maxRows);
      for (var i = 1; i < pagenum;) {
        $('.pagination').append('<li data-page = "'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span>
        </span>\</li>').show();
      }
    }
    $('pagination li:first-child').addClass('active');
    $('pagination li').on('click', function(){
      var pageNum = $(this).attr('data-page');
      var trIndex = 0;
      $('.pagination li').removeClass('active');
      $(this).addClass('active');
      $(table+' tr:gt(0)').each(function(){
        trIndex++;
        if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)) {
          $(this).hide();
        }else{
          $(this).show();
        }
      })
    })
  })
  $(function(){
    $('table tr:eq(0)').prepend('<th>ID</th>');
    var id = 0;
    $('table tr:gt(0)').each(function(){
      id++;
      $(this).prepend('<td>'+id+'</td>');
    })
  })
</script>
