<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaPKKController extends Controller
{
    public function index()
    {
        return view('PKK.Anggota.index');
    }
    public function create()
    {
        return view('PKK.Anggota.create');
    }
    public function edit()
    {
        return view('PKK.Anggota.edit');
    }
    public function show()
    {
        return view('PKK.Anggota.show');
    }
}
