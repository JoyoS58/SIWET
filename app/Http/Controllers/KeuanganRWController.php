<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganRWController extends Controller
{
    public function index()
    {
        return view('RW.Keuangan.index');
    }
    public function create()
    {
        return view('RW.Keuangan.create');
    }
    public function edit(){
        return view('RW.Keuangan.edit');
    }
    public function show(){
        return view('RW.Keuangan.show');
    }
}

