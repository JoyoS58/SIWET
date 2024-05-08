<?php

namespace App\Http\Controllers;

use App\Models\KegiatanRW;
use Illuminate\Http\Request;
use App\Models\RW;
use Yajra\DataTables\Facades\DataTables;

class KegiatanRWController extends Controller
{
    public function index(){
        $dataKegiatan = KegiatanRW::all();
        return view('RW.Kegiatan.index', compact('dataKegiatan'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_Kegiatan' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'penanggung_Jawab' =>'required',
            'tempat' =>'required',
            'dekripsi' => 'required',
        ]);

        KegiatanRW::create([
            'ID_RW' => 1,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'dekripsi' => $request->dekripsi,
        ]);

        return redirect('kegiatanRW')->with('success', 'Data Kegiatan Berhasil Disimpan');
    }
    public function create()
    {
        $dataRW = RW::all();
        return view('RW.Kegiatan.create',['RW' => $dataRW]);
    }
    public function edit(string $id)
    {
        $kegiatanRW = KegiatanRW::find($id);
        $RW = RW::all();
        return view('RW.Kegiatan.edit', ['kegiatanRW' => $kegiatanRW,'RW' => $RW]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_Kegiatan' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'penanggung_Jawab' =>'required',
            'tempat' =>'required',
            'dekripsi' => 'required',
        ]);

        KegiatanRW::find($id)->update([
            // 'ID_RW' =>  $request->ID_RW,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'dekripsi' => $request->dekripsi,
        ]);

        return redirect('kegiatanRW')->with('success', 'Data Kegiatan Berhasil Diubah');
    }
    public function show(string $id)
    {
        $kegiatanRW = KegiatanRW::find($id);
        return view('RW.Kegiatan.show', ['kegiatanRW' => $kegiatanRW]);
    }
    public function destroy(string $id)
    {
        $check = KegiatanRW::find($id);
        if (!$check) {
            return redirect('kegiatanRW')->with('error', 'Data Kegiatan tidak ditemukan');
        }
        try {
            KegiatanRW::destroy($id);

            return redirect('kegiatanRW')->with('success', 'Data Kegiatan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('kegiatanRW')->with('error', 'Data Kegiatan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    // public function index()
    // {
    //     return view('RW.Kegiatan.index');
    // }
    // public function create()
    // {
    //     return view('RW.Kegiatan.create');
    // }
    // public function edit()
    // {
    //     return view('RW.Kegiatan.edit');
    // }
    // public function show()
    // {
    //     return view('RW.Kegiatan.show');
    // }
}
