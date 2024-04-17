<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganPKKController extends Controller
{
    public function index()
    {
        return view('PKK.Keuangan.index');
    }
    public function create()
    {
        return view('PKK.Keuangan.create');
    }
    public function edit(){
        return view('PKK.Keuangan.edit');
    }
    public function show(){
        return view('PKK.Keuangan.show');
    }
}
