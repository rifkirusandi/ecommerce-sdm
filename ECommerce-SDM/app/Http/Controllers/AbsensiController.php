<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
  public function getAbsensi($id){
    $id_pegawai = Absensi::find($id);

    if ($id_pegawai == null) {
      return response([
        'status' => false,
        'message' => 'Data tidak ditemukan.'
      ], 404);
    }else{
      return response([
        'data' => $id_pegawai
      ], 200);
    }
  }

  public function insertAbsensi(Request $request){
    $absensi = new Absensi;
    $absensi->id_pegawai = $request->input('id_pegawai');
    $jam_masuk = $absensi->jam_masuk = date('Y-m-d H:i:s');
    $jam_keluar = $absensi->jam_keluar = $request->input('jam_keluar');

    $startTime = Carbon::parse($jam_masuk);
    $endTime = Carbon::parse($jam_keluar);

    $absensi->jam_kerja = (int)$startTime->diff($endTime)->format('%H');
    $absensi->tanggal = date('Y-m-d');
    $absensi->created_at = date('Y-m-d H:i:s');
    $absensi->updated_at = date('Y-m-d H:i:s');
    $absensi->save();

    return response([
      'status' => 'OK',
      'message' => 'Pegawai ditambahkan',
      'data' => $absensi
    ], 200);
  }

}
