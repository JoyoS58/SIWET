<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        return view('warga.index');
    }
    public function create()
    {
        return view('warga.create');
    }
    public function edit(){
        return view('warga.edit');
    }
    public function show(){
        return view('warga.show');
    }
}
