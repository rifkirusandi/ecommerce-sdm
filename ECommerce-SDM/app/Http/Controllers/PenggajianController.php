<?php

namespace App\Http\Controllers;

use App\Penggajian;
use Illuminate\Support\Facades\DB;
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

        $total = $penggajian->jam_kerja = $request->input('jam_kerja');

        foreach ($jabatan as $item) {
          if ($item -> jabatan == 'Manager') {
            $gaji = $total*200000;
          }else{
            $gaji = $total*100000;
          }
        }

        $penggajian->gaji = $gaji;
        $penggajian->status = $request->input('status');
        $penggajian->tanggal = date('Y-m-d H:i:s');
        $penggajian->created_at = date('Y-m-d H:i:s');
  		  $penggajian->updated_at = date('Y-m-d H:i:s');
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
        $id_pegawai = $request->id_pegawai;
        $jam_kerja = $request->jam_kerja;
        $gaji = $request->gaji;
        $status = $request->status;

        $penggajian = Penggajian::find($id);
        $penggajian->id_pegawai = $id_pegawai;
        $penggajian->jam_kerja = $jam_kerja;
        $penggajian->gaji = $gaji;
        $penggajian->status = $status;

        $penggajian->save();

        return "Data berhasil di update";
    }

    public function delete($id) {
        $penggajian = Penggajian::find($id);
        $penggajian->delete();

        return "Data berhasil di hapus";
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
}
