<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\Pegawai;
use DB;

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
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $alamat = $request->input('alamat');
        $divisi = $request->input('divisi');
        $jabatan = $request->input('jabatan');

        DB::update('update pegawais set nama = ?, umur = ?, alamat = ?, divisi = ?, jabatan = ? where id = ?'
        , [$nama, $umur, $alamat, $divisi, $jabatan, $id]);

        return redirect()->route('listPegawai');
    }

    public function delete($id) {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return redirect()->route('listPegawai');
    }

    public function list(){
        $data = Http::get('http://divisi-sdm.herokuapp.com/api/pegawai');
        $data = json_decode($data, true);
        return view('pegawai', ['data'=>$data]);
    }

    public function tambah(){
        return view('tambahPegawai');
    }

    public function edit($id){
        $data = DB::select('select * from pegawais where id = ?', [$id]);
        return view('editPegawai', ['data'=>$data]);
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

    public function hapus($id){
      $client = new Client();
      $url = "http://divisi-sdm.herokuapp.com/api/pegawai";

      $request = $client->delete($url, [
        'headers'   => ['Content-Type' => 'application/json'],
      ]);

      return redirect()->route('listPegawai');
    }
}
