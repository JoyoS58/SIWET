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
        $dataKriteria = DataKriteria::with('kriteria')->get();
        return view('PKK.SPK.DataKriteria.index', compact('dataKriteria'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('PKK.SPK.DataKriteria.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        Log::info($request->all());

        $request->validate([
            'ID_Kriteria' => 'required|exists:Kriteria,ID_Kriteria',
            'kategori'        => 'required',
            'nilai'       => 'required|numeric',
        ]);

        try {
            $dataKriteria = new DataKriteria();
            $dataKriteria->ID_Kriteria = $request->ID_Kriteria;
            $dataKriteria->kategori = $request->kategori;
            $dataKriteria->nilai = $request->nilai;

            $dataKriteria->nama_Kriteria = Kriteria::findOrFail($request->ID_Kriteria)->nama_Kriteria;
            $dataKriteria->save();

            return redirect()->route('DataKriteria.index')->with('msg', 'Berhasil menambah data');
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambah data');
        }
    }

    public function edit($id)
    {
        $dataKriteria = DataKriteria::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('PKK.SPK.DataKriteria.edit', compact('dataKriteria', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Kriteria' => 'required|exists:Kriteria,ID_Kriteria',
            'kategori'    => 'required|string',
            'nilai'       => 'required|numeric',
        ]);

        try {
            $dataKriteria = DataKriteria::findOrFail($id);
            $dataKriteria->ID_Kriteria = $request->ID_Kriteria;
            $dataKriteria->kategori = $request->kategori;
            $dataKriteria->nilai = $request->nilai;
            $dataKriteria->save();

            return redirect()->route('DataKriteria.index')->with('msg', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }

    public function destroy($id)
    {
        try {
            $dataKriteria = DataKriteria::findOrFail($id);
            $dataKriteria->delete();

            return redirect()->route('DataKriteria.index')->with('msg', 'Berhasil menghapus data');
        } catch (Exception $e) {
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
