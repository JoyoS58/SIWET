<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanPKKController extends Controller
{
    public function index()
    {
        return view('PKK.Kegiatan.index');
    }
    public function create()
    {
        return view('PKK.Kegiatan.create');
    }
    public function edit(){
        return view('PKK.Kegiatan.edit');
    }
    public function show(){
        return view('PKK.Kegiatan.show');
    }
}
