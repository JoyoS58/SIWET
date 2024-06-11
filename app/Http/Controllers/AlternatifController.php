<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{

    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = kriteria::all();
        return view('PKK.SPK.alternatif.index', compact('alternatif','kriteria'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ]);
    
        Alternatif::create($request->all());
    
        return redirect()->route('alternatif.index')->with('msg_alternatif', 'Alternatif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('PKK.SPK.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ]);

        $alternatif = Alternatif::findOrFail($id);
        $alternatif->update($request->all());

        return redirect()->route('alternatif.index')->with('msg_alternatif', 'Alternatif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        return redirect()->back()->with('msg_alternatif', 'Alternatif berhasil dihapus.');
    }
}