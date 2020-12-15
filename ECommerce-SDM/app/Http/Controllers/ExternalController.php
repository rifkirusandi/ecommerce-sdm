<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ExternalController extends Controller
{
    public function finance(Request $request){
      $client = new Client();
      $url = "https://finance-ecommerce.herokuapp.com/api/kas/keluar";
      $body = [
        'transaksi_id' => $request->transaksi_id,
        'pegawai_id' => $request->pegawai_id,
        'jenis' => $request->jenis,
        'nama' => $request->nama,
        'keterangan' => $request->keterangan,
        'divisi' => $request->divisi,
        'biaya' => $request->biaya,
      ];

      $request = $client->post($url, [
        'headers'   => ['Content-Type' => 'application/json'],
        'body'      => json_encode($body),
      ]);

      return redirect()->route('KasKeluar');
    }

    public function sales(){
      $client = new Client();
      $url = "https://eai-sales.herokuapp.com/api/advertisement/create";
      $body = [
        'title' => $request->title,
        'description' => $request->description,
        'platform' => $request->platform,
        'duration' => $request->duration,
        'price' => $request->price,
      ];

      $request = $client->post($url, [
        'headers'   => ['Content-Type' => 'application/json'],
        'body'      => json_encode($body),
      ]);

      return redirect()->route('Advert');
    }
}
