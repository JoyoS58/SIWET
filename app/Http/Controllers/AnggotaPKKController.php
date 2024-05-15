<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPKK;
use App\Models\PKK;
use Illuminate\Http\Request;

class AnggotaPKKController extends Controller
{
    public function index()
    {
        $AnggotaPKK = AnggotaPKK::all();
        return view('PKK.Anggota.index', compact('AnggotaPKK'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            // 'ID_Anggota' => 'required',
            // 'ID_Pengurus' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_Telepon' => 'required',
        ]);

        AnggotaPKK::create([
            'ID_Pengurus' => 1,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nomor_Telepon' => $request->nomor_Telepon,
        ]);

        return redirect('AnggotaPKK')->with('success', 'Data Anggota Berhasil Disimpan');
    }
    public function create()
    {
        $dataPKK = PKK::all();
        return view('PKK.Anggota.create', ['PKK' => $dataPKK]);
    }
    public function edit(string $id)
    {
        $AnggotaPKK = AnggotaPKK::find($id);
        $PKK = PKK::all();
        return view('PKK.Anggota.edit', ['AnggotaPKK' => $AnggotaPKK, 'PKK' => $PKK]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'ID_Anggota' => 'required',
            // 'ID_Pengurus' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_Telepon' => 'required',
        ]);

        AnggotaPKK::find($id)->update([
            // 'ID_Pengurus' => $request->ID_Pengurus,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nomor_Telepon' => $request->nomor_Telepon,
        ]);

        return redirect('AnggotaPKK')->with('success', 'Data Anggota Berhasil Diubah');
    }
    public function show(string $id)
    {
        $AnggotaPKK = AnggotaPKK::find($id);
        return view('PKK.Anggota.show', ['anggota' => $AnggotaPKK]);
    }

    public function destroy(string $id)
    {
        $check = AnggotaPKK::find($id);
        if (!$check) {
            return redirect('AnggotaPKK')->with('error', 'Data Anggota tidak ditemukan');
        }

        try {
            AnggotaPKK::destroy($id);

            return redirect('AnggotaPKK')->with('success', 'Data Anggota berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('AnggotaPKK')->with('error', 'Data Anggota gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    // public function index()
    // {
    //     return view('PKK.Anggota.index');
    // }
    // public function create()
    // {
    //     return view('PKK.Anggota.create');
    // }
    // public function edit()
    // {
    //     return view('PKK.Anggota.edit');
    // }
    // public function show()
    // {
    //     return view('PKK.Anggota.show');
    // }
}
