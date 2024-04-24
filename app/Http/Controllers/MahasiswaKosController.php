<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaKosController extends Controller
{
    public function index()
    {
        return view('RW.MahasiswaKos.index');
    }
    public function create()
    {
        return view('RW.MahasiswaKos.create');
    }
    public function edit(){
        return view('RW.MahasiswaKos.edit');
    }
    public function show(){
        return view('RW.MahasiswaKos.show');
    }
}
