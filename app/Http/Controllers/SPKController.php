<?php

namespace App\Http\Controllers;

use App\Models\kriteriaEdas;
use App\Models\Warga;
use Illuminate\Http\Request;

class SPKController extends Controller
{
    public function show(string $id)
    {
        $Warga = Warga::find($id);
        return view('PKK.SPK.show', ['Warga' => $Warga]);
    }

    public function indexAlternatif(){
        return view('PKK.SPK.index');
    }
    public function indexKriteria(){
        return view('PKK.SPK.Kriteria.index');
    }


}
