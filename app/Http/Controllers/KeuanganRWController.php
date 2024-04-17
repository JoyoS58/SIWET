<?php

namespace App\Http\Controllers;

use App\Models\KeuanganRW;
use Illuminate\Http\Request;

class KeuanganRWController extends Controller
{
    public function index()
    {
        // $kas = KeuanganRW::all();

        // return view('keuanganRW.index', compact('kas'));
        return view('keuanganRW.index');
    }
}
