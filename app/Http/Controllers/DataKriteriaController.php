<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKriteria;
use App\Models\Kriteria;
use Exception;
use Illuminate\Support\Facades\Log;

class DataKriteriaController extends Controller
{
    public function index()
    {
        $dataKriteria = DataKriteria::with('kriteria')->orderBy('nama', 'ASC')->get();
        return view('PKK.SPK.DataKriteria.index', compact('dataKriteria'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('PKK.SPK.DataKriteria.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'ID_Kriteria' => 'required|exists:Kriteria,ID_Kriteria',
            'nama'        => 'required|string',
            'nilai'       => 'required|numeric',
        ]);

        try {
            $dataKriteria = new DataKriteria();
            $dataKriteria->ID_Kriteria = $request->ID_Kriteria;
            $dataKriteria->nama = $request->nama;
            $dataKriteria->nilai = $request->nilai;
            $dataKriteria->save();

            return redirect()->route('dataKriteria.index')->with('msg', 'Berhasil menambah data');
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambah data');
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'ID_Kriteria' => 'required|exists:Kriteria,ID_Kriteria',
            'nama'        => 'required|string',
            'nilai'       => 'required|numeric',
        ]);

        try {
            $dataKriteria = DataKriteria::findOrFail($id);
            $dataKriteria->ID_Kriteria = $request->ID_Kriteria;
            $dataKriteria->nama = $request->nama;
            $dataKriteria->nilai = $request->nilai;
            $dataKriteria->save();

            return redirect()->route('dataKriteria.index')->with('msg', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }


    public function edit($id)
    {
        $dataKriteria = DataKriteria::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('PKK.SPK.DataKriteria.edit', compact('dataKriteria', 'kriteria'));
    }

    public function destroy($id)
    {
        try {
            $dataKriteria = DataKriteria::findOrFail($id);
            $dataKriteria->delete();

            return redirect()->route('dataKriteria.index')->with('msg', 'Berhasil menghapus data');
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
