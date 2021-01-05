<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\Pegawai;

class PegawaiController extends Controller
{
  //Menampilkan semua data pegawai
    public function getAllPegawai(){
      return response()->json(Pegawai::all(), 200);
    }

    public function getPegawai($id){
      $id_pegawai = Pegawai::find($id);

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

    public function insertPegawai(Request $request){
      $pegawai = new Pegawai;
      $pegawai->nama = $request->input('nama');
      $pegawai->umur = $request->input('umur');
      $pegawai->alamat = $request->input('alamat');
      $pegawai->divisi = $request->input('divisi');
      $pegawai->jabatan = $request->input('jabatan');
      $pegawai->created_at = date('Y-m-d H:i:s');
		  $pegawai->updated_at = date('Y-m-d H:i:s');
      $pegawai->save();

      return response([
        'status' => 'OK',
        'message' => 'Pegawai ditambahkan',
        'data' => $pegawai
      ], 200);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $umur = $request->umur;
        $alamat = $request->alamat;
        $divisi = $request->divisi;
        $jabatan = $request->jabatan;

        $pegawai = Pegawai::find($id);
        $pegawai->nama = $nama;
        $pegawai->umur = $umur;
        $pegawai->alamat = $alamat;
        $pegawai->divisi = $divisi;
        $pegawai->jabatan = $jabatan;

        $pegawai->save();

        return response([
          'status' => 'OK',
          'message' => 'Data berhasil diupdate.',
          'data' => $penggajian
        ], 200);
    }

    public function delete($id) {
        $pengawai = Pegawai::find($id);
        $pegawai->delete();

        return "Data berhasil di hapus";
    }

    public function list(){
        $data = Http::get('http://divisi-sdm.herokuapp.com/api/pegawai');
        $data = json_decode($data, true);
        return view('pegawai', ['data'=>$data]);
    }

    public function tambah(){
        return view('tambahPegawai');
    }

    public function create1(Request $request){
      $client = new Client();
      $url = "http://divisi-sdm.herokuapp.com/api/pegawai";
      $body = [
        'nama' => $request->nama,
        'umur' => $request->umur,
        'alamat' => $request->alamat,
        'divisi' => $request->divisi,
        'jabatan' => $request->jabatan,
      ];

      $request = $client->post($url, [
        'headers'   => ['Content-Type' => 'application/json'],
        'body'      => json_encode($body),
      ]);

      return redirect()->route('listPegawai');
    }
}
