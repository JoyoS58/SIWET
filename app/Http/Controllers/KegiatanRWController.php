<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanRWController extends Controller
{
    public function index()
    {
        return view('RW.Kegiatan.index');
    }
    public function create()
    {
        return view('RW.Kegiatan.create');
    }
    public function edit()
    {
        return view('RW.Kegiatan.edit');
    }
    public function show()
    {
        return view('RW.Kegiatan.show');
    }
}
