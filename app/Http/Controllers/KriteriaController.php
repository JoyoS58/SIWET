<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use Exception;
use Illuminate\Support\Facades\Log;

class KriteriaController extends Controller
{
    public function index()
    {
        $data['kriteria'] = Kriteria::orderBy('nama_Kriteria', 'ASC')->get();
        return view('PKK.SPK.Saw.Kriteria.index',$data);
    }

    public function store(Request $request)
{
    Log::info($request->all()); // Log the incoming request data

    $request->validate([
        'nama_kriteria' => 'required|string',
        'atribut'       => 'required|string',
        'bobot'         => 'required|numeric',
    ]);

    try {
        $kriteria = new Kriteria();
        $kriteria->nama_Kriteria = $request->nama_kriteria;
        $kriteria->kode_Kriteria = $request->kode_kriteria ?? '';
        $kriteria->atribut = $request->atribut;
        $kriteria->bobot_Kriteria = $request->bobot;
        $kriteria->save();

        return redirect()->back()->with('msg', 'Berhasil menambah data');
    } catch (Exception $e) {
        Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
        return redirect()->back()->with('error', 'Gagal menambah data');
    }
}


    public function edit($id)
    {
        $data['kriteria'] = Kriteria::findOrFail($id);
        return view('SPK.kriteria.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required|string',
            'atribut'       => 'required|string',
            'bobot'         => 'required|numeric',
        ]);

        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->update([
                'nama_Kriteria' => $request->nama_kriteria,
                'atribut'       => $request->atribut,
                'bobot_Kriteria'=> $request->bobot
            ]);

            return back()->with('msg', 'Berhasil merubah data');
        } catch (Exception $e) {
            Log::emergency("file:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            die("gagal");
        }
    }

    public function destroy($id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->delete();

            return back()->with('msg', 'Berhasil menghapus data');
        } catch (Exception $e) {
            Log::emergency("file:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            die("gagal");
        }
    }
}
