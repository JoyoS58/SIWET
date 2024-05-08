<?php

namespace App\Http\Controllers;

use App\Models\KegiatanRW;
use Illuminate\Http\Request;
use App\Models\RW;
use Yajra\DataTables\Facades\DataTables;

class KegiatanRWController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Kegiatan RW',
            'list' => ['Home', 'Keuangan']
        ];

        $page = (object)[
            'title' => 'Daftar Kegiatan'
        ];

        $activeMenu = 'kegiatanRW';

        $ID_RW = RW::all();

        return view('RW.Kegiatan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ID_RW' => $ID_RW, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $kegiatanRW = KegiatanRW::select('ID_Kegiatan_RW','ID_RW','nama_Kegiatan','tangal','penanggung_Jawab','tempat','dekripsi')
                    ->with('ID_RW');

        if ($request->ID_RW) {
            $kegiatanRW->where('ID_RW', $request->ID_RW);
        }

        return DataTables::of($kegiatanRW)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kegiatanRW) {  // menambahkan kolom aksi 
                $btn = '';
                $btn .= '<a href="'.url('/kegiatanRW/' . $kegiatanRW->ID_Transaksi . '/edit').'" class="btn btn-primary btn-sm">Edit</a> '; 
                $btn .= '<form class="d-inline-block" method="POST" action="'. 
                        url('/kegiatanRW/'.$kegiatanRW->ID_Transaksi).'">' 
                        . csrf_field() . method_field('DELETE') .  
                        '<button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm(\'Apakah Anda yakit menghapus data 
                        ini?\');">Hapus</button></form>';      
                $btn  = '<a href="'.url('/kegiatanRW/' . $kegiatanRW->ID_Transaksi).'" class="btn btn-success btn-sm">Detail</a>';
                return $btn; 
            }) 
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Kegiatan',
            'list'  => ['Home', 'kegiatanRW', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Kegiatan baru'
        ];

        $ID_RW = RW::all();
        $activeMenu = 'kegiatanRW';

        return view('RW.Kegiatan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ID_RW' => $ID_RW, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'nama_Kegiatan' => 'required|string',
            'tanggal' => 'required|date',
            'penanggung_Jawab' =>'required|string',
            'tempat' =>'required|string',
            'dekripsi' => 'required|string',
        ]);

        KegiatanRW::create([
            'ID_RW' => 1,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'dekripsi' => $request->dekripsi,
        ]);

        return redirect('/kegiatanRW')->with('success', 'Data Transaksi berhasil disimpan');
    }

    public function show(String $id){
        $kegiatanRW = KegiatanRW::with('ID_RW')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Kegiatan',
            'list' => ['Home', 'kegiatanRW', 'Detail'],
        ];

        $page = (object)[
            'title' => 'Detail Kegiatan'
        ];

        $activeMenu = 'kegiatanRW';

        return view('RW.Keuangan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kegiatanRW' => $kegiatanRW, 'activeMenu' => $activeMenu]);
    }

    public function edit(String $id){
        $kegiatanRW = KegiatanRW::find($id);
        $RW = RW::all();

        $breadcrumb = (object)[
            'title' => 'Edit Kegiatan',
            'list' => ['Home', 'kegiatanRW', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Kegiatan'
        ];

        $activeMenu = 'kegiatanRW';

        return view('RW.Keuangan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kegiatanRW' => $kegiatanRW, 'RW' => $RW, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, String $id){
        $request->validate([
            'nama_Kegiatan' => 'required|string',
            'tanggal' => 'required|date',
            'penanggung_Jawab' =>'required|string',
            'tempat' =>'required|string',
            'dekripsi' => 'required|string',
        ]);

        KegiatanRW::find($id)->update([
            'ID_RW' => 1,
            'nama_Kegiatan' => $request->nama_Kegiatan,
            'tanggal' => $request->tanggal,
            'penanggung_Jawab' => $request->penanggung_Jawab,
            'tempat' => $request->tempat,
            'dekripsi' => $request->dekripsi,
        ]);

        return redirect('/kegiatanRW')->with('success', 'Data Transaksi berhasil diubah');
    }

    public function destroy(String $id){
        $check = KegiatanRW::find($id);
        if (!$check) {
            return redirect('/kegiatanRW')->with('error', 'Data Transaksi tidak ditemukan');
        }

        try {
            KegiatanRW::destroy($id);
            return redirect('/kegiatanRW')->with('success', 'Data Transaksi berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e) {
            return redirect('/kegiatanRW')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
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
