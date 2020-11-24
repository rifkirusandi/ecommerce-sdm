<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
}
