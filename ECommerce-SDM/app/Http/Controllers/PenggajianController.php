<?php

namespace App\Http\Controllers;

use App\Penggajian;
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
    public function create(request $request)
    {
        $penggajian = new Penggajian;
        $penggajian->id_pegawai = $request->$id_pegawai;
        $penggajian->jam_kerja = $request->$jam_kerja;
        $penggajian->gaji = $request->$gaji;
        $penggajian->status = $request->$status;
        $penggajian->save();

        return "Data Berhasil Masuk";
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
