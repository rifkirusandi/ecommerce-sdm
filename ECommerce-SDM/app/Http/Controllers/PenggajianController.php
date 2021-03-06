<?php

namespace App\Http\Controllers;

use App\Penggajian;
use App\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Penggajian::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $penggajian = new Penggajian;
        $penggajian->id_pegawai = $request->input('id_pegawai');

        $jabatan = DB::table('pegawais')->where('id', $penggajian->id_pegawai)->select('jabatan')->get();

        //jam_kerja
        $total = $penggajian->jam_kerja = $request->input('jam_kerja');

        foreach ($jabatan as $item) {
          if ($item -> jabatan == 'Manager') {
            $gaji = $total*200000;
          }else{
            $gaji = $total*100000;
          }
        }
        $penggajian->gaji = $gaji;
        $penggajian->status = $request->input('status', 'Menunggu');
        $penggajian->tanggal = date('Y-m-d H:i:s');
        $penggajian->created_at = date('Y-m-d H:i:s');
  		  $penggajian->updated_at = date('Y-m-d H:i:s');
        $penggajian->keterangan = $request->input('keterangan');
        $penggajian->save();

        return response([
          'status' => 'OK',
          'message' => 'Data berhasil ditambahkan.',
          'data' => $penggajian
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Penggajian::where('id',$id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penggajian $penggajian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = $request->status;

        $penggajian = Penggajian::find($id);
        $penggajian->status = $status;

        $penggajian->save();

        return response([
          'status' => 'OK',
          'message' => 'Data berhasil diupdate.',
          'data' => $penggajian
        ], 200);
    }

    public function delete($id) {
        $penggajian = Penggajian::find($id);
        $penggajian->delete();

        return redirect()->route('listPenggajian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggajian $penggajian)
    {
        //
    }

    public function list(){
        $data = Http::get('http://divisi-sdm.herokuapp.com/api/penggajian');
        $data = json_decode($data, true);
        return view('penggajian', ['data'=>$data]);
    }

    public function tambah(){
        return view('tambahPenggajian');
    }

    public function create1(Request $request){
      $client = new Client();
      $url = "http://divisi-sdm.herokuapp.com/api/penggajian";
      $body = [
        'id_pegawai' => $request->id_pegawai,
        'jam_kerja' => $request->jam_kerja,
      ];

      $request = $client->post($url, [
        'headers'   => ['Content-Type' => 'application/json'],
        'body'      => json_encode($body),
      ]);

      return redirect()->route('listPenggajian');
    }
}
