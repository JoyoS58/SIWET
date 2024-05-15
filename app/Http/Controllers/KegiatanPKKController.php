<?php

namespace App\Http\Controllers;

use App\Models\KegiatanPKK;
use App\Models\PKK;
use Illuminate\Http\Request;

class KegiatanPKKController extends Controller
{
    public function index(){
        $dataKegiatan = KegiatanPKK::all();
        return view('PKK.Kegiatan.index', compact('dataKegiatan'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_Kegiatan' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'penanggung_Jawab' =>'required',
            'tempat' =>'required',
            'deskripsi' => 'required',
        ]);

        KegiatanPKK::create([
            'ID_Pengurus' => 1,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('kegiatanPKK')->with('success', 'Data Kegiatan Berhasil Disimpan');
    }
    public function create()
    {
        $dataPKK = PKK::all();
        return view('PKK.Kegiatan.create',['PKK' => $dataPKK]);
    }
    public function edit(string $id)
    {
        $kegiatanPKK = KegiatanPKK::find($id);
        $PKK = PKK::all();
        return view('PKK.Kegiatan.edit', ['kegiatanPKK' => $kegiatanPKK,'PKK' => $PKK]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_Kegiatan' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'penanggung_Jawab' =>'required',
            'tempat' =>'required',
            'deskripsi' => 'required',
        ]);

        KegiatanPKK::find($id)->update([
            // 'ID_PKK' =>  $request->ID_PKK,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('kegiatanPKK')->with('success', 'Data Kegiatan Berhasil Diubah');
    }
    public function show(string $id)
    {
        $kegiatanPKK = KegiatanPKK::find($id);
        return view('PKK.Kegiatan.show', ['kegiatanPKK' => $kegiatanPKK]);
    }
    public function destroy(string $id)
    {
        $check = KegiatanPKK::find($id);
        if (!$check) {
            return redirect('kegiatanPKK')->with('error', 'Data Kegiatan tidak ditemukan');
        }
        try {
            KegiatanPKK::destroy($id);

            return redirect('kegiatanPKK')->with('success', 'Data Kegiatan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('kegiatanPKK')->with('error', 'Data Kegiatan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    // public function index()
    // {
    //     return view('PKK.Kegiatan.index');
    // }
    // public function create()
    // {
    //     return view('PKK.Kegiatan.create');
    // }
    // public function edit(){
    //     return view('PKK.Kegiatan.edit');
    // }
    // public function show(){
    //     return view('PKK.Kegiatan.show');
    // }
}
