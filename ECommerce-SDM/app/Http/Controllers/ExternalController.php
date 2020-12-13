<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function finance(){
      return view('kasKeluar');
    }

    public function sales(){
      return view('advertisement');
    }
}
