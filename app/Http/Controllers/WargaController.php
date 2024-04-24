<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        return view('RW.warga.index');
    }
    public function create()
    {
        return view('RW.warga.create');
    }
    public function edit(){
        return view('RW.warga.edit');
    }
    public function show(){
        return view('RW.warga.show');
    }
}
