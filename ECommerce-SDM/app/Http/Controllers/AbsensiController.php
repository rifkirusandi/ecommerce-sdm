<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
  public function getAbsensi(){
    return response()->json(Absensi::all(), 200);
  }

  public function insertAbsensi(Request $request){
    $absensi = new Absensi;
    $absensi->id_pegawai = $request->input('id_pegawai');
    $jam_masuk = $absensi->jam_masuk = $request->input('jam_masuk');
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
      'message' => 'Absensi ditambahkan',
      'data' => $absensi
    ], 200);
  }

  public function list(){
      $data = Http::get('http://divisi-sdm.herokuapp.com/api/absensi');
      $data = json_decode($data, true);
      return view('absensi', ['data'=>$data]);
  }

  public function tambah(){
      return view('tambahAbsensi');
  }

  public function create1(Request $request){
    $client = new Client();
    $url = "http://divisi-sdm.herokuapp.com/api/absensi";
    $body = [
      'id_pegawai' => $request->id_pegawai,
      'jam_masuk' => $request->jam_masuk,
      'jam_keluar' => $request->jam_keluar,
    ];

    $request = $client->post($url, [
      'headers'   => ['Content-Type' => 'application/json'],
      'body'      => json_encode($body),
    ]);

    return redirect()->route('Absensi');
  }

}
