<?php

namespace App\Http\Controllers;

use App\Models\KegiatanRW;
use Illuminate\Http\Request;
use App\Models\RW;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class KegiatanRWController extends Controller
{
    public function index(Request $request)
    {
        $query = KegiatanRW::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_Kegiatan', 'LIKE', "%$search%")
                  ->orWhere('penanggung_Jawab', 'LIKE', "%$search%")
                  ->orWhere('tempat', 'LIKE', "%$search%");
        }

        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
            $query->where('penanggung_Jawab', $filter);
        }

        $dataKegiatan = $query->get();
        $penanggungJawab = KegiatanRW::select('penanggung_Jawab')->distinct()->get();

        return view('RW.Kegiatan.index', compact('dataKegiatan', 'penanggungJawab'));
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
            'gambar' => 'image|max:5000',
        ]);
        $pathBaru = null;
        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'web-'.time().".". $extFile;

            Storage::disk('img_inventaris')->put($namaFile, file_get_contents($imageFile));
            $pathBaru = $namaFile;
        }
        KegiatanRW::create([
            'ID_RW' => 1,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'gambar' => $pathBaru,
        ]);

        return redirect('KegiatanRW')->with('success', 'Data Kegiatan Berhasil Disimpan');
    }
    public function create()
    {
        $dataRW = RW::all();
        return view('RW.Kegiatan.create',['RW' => $dataRW]);
    }
    public function edit(string $id)
    {
        $KegiatanRW = KegiatanRW::find($id);
        $RW = RW::all();
        return view('RW.Kegiatan.edit', ['KegiatanRW' => $KegiatanRW,'RW' => $RW]);
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
            'gambar' => 'image|max:5000',
        ]);
        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'web-'.time().".". $extFile;

            Storage::disk('img_inventaris')->put($namaFile, file_get_contents($imageFile));
            $pathBaru = $namaFile;

            KegiatanRW::find($request->ID_Kegiatan)->update([
                'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'gambar' => $pathBaru,
            ]);
        } else {
            KegiatanRW::find($request->ID_Kegiatan)->update([
                'nama_Kegiatan' => $request->nama_Kegiatan,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            ]);
        }


        return redirect('KegiatanRW')->with('success', 'Data Kegiatan Berhasil Diubah');
    }
    public function show(string $id)
    {
        $KegiatanRW = KegiatanRW::find($id);
        return view('RW.Kegiatan.show', ['KegiatanRW' => $KegiatanRW]);
    }
    public function destroy(string $id)
    {
        $check = KegiatanRW::find($id);
        if (!$check) {
            return redirect('KegiatanRW')->with('error', 'Data Kegiatan tidak ditemukan');
        }
        try {
            KegiatanRW::destroy($id);

            return redirect('KegiatanRW')->with('success', 'Data Kegiatan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('KegiatanRW')->with('error', 'Data Kegiatan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
