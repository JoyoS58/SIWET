<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganRW;
use App\Models\RW;
use Yajra\DataTables\Facades\DataTables;



class KeuanganRWController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Keuangan RW',
            'list' => ['Home', 'Keuangan']
        ];

        $page = (object)[
            'title' => 'Daftar transaksi'
        ];

        $activeMenu = 'keuanganRW';

        $ID_RW = RW::all();

        return view('RW.Keuangan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ID_RW' => $ID_RW, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $keuanganRW = KeuanganRW::select('ID_Transaksi','ID_RW','nominal','jenis_Transaksi','tanggal_Transaksi','saldo','deskripsi')
                    ->with('ID_RW');

        if ($request->ID_RW) {
            $keuanganRW->where('ID_RW', $request->ID_RW);
        }

        return DataTables::of($keuanganRW)
            ->addIndexColumn()
            ->addColumn('aksi', function ($keuanganRW) {  // menambahkan kolom aksi 
                $btn = '';
                $btn .= '<a href="'.url('/keuanganRW/' . $keuanganRW->ID_Transaksi . '/edit').'" class="btn btn-primary btn-sm">Edit</a> '; 
                $btn .= '<form class="d-inline-block" method="POST" action="'. 
                        url('/keuanganRW/'.$keuanganRW->ID_Transaksi).'">' 
                        . csrf_field() . method_field('DELETE') .  
                        '<button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm(\'Apakah Anda yakit menghapus data 
                        ini?\');">Hapus</button></form>';      
                $btn  = '<a href="'.url('/keuanganRW/' . $keuanganRW->ID_Transaksi).'" class="btn btn-success btn-sm">Detail</a>';
                return $btn; 
            }) 
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Transaksi',
            'list'  => ['Home', 'keuanganRW', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Transaksi baru'
        ];

        $ID_RW = RW::all();
        $activeMenu = 'keuanganRW';

        return view('RW.Keuangan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ID_RW' => $ID_RW, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'ID_RW' => 'required|integer',
            'nominal' => 'required|decimal:2,10',
            'jenis_Transaksi' => 'required|string',
            'tanggal_Transaksi' =>'required|date',
            'saldo' =>'required|decimal',
            'deskripsi' => 'required|string',
        ]);

        KeuanganRW::create([
            'ID_RW' => $request->ID_RW,
            'nominal' => $request->nominal,
            'jenis_Transaksi' => $request->jenis_Transaksi,
            'tanggal_Transaksi' => $request->tanggal_Transaksi,
            'saldo' => $request->saldo,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/keuanganRW')->with('success', 'Data Transaksi berhasil disimpan');
    }

    public function show(String $id){
        $keuanganRW = KeuanganRW::with('RW')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Transaksi',
            'list' => ['Home', 'keuanganRW', 'Detail'],
        ];

        $page = (object)[
            'title' => 'Detail Transaksi'
        ];

        $activeMenu = 'keuanganRW';

        return view('RW.Keuangan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'keuanganRW' => $keuanganRW, 'activeMenu' => $activeMenu]);
    }

    public function edit(String $id){
        $keuanganRW = KeuanganRW::find($id);
        $RW = RW::all();

        $breadcrumb = (object)[
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'KeuanganRW', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit User'
        ];

        $activeMenu = 'KeuanganRW';

        return view('RW.Keuangan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'keuanganRW' => $keuanganRW, 'RW' => $RW, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, String $id){
        $request->validate([
            'ID_RW' => 'required|string',
            'nominal' => 'required|decimal',
            'jenis_Transaksi' => 'required|string',
            'tanggal_Transaksi' =>'required|date',
            'saldo' =>'required|decimal',
            'deskripsi' => 'required|string',
        ]);

        KeuanganRW::find($id)->update([
            'ID_RW' => $request->ID_RW,
            'nominal' => $request->nominal,
            'jenis_Transaksi' => $request->jenis_Transaksi,
            'tanggal_Transaksi' => $request->tanggal_Transaksi,
            'saldo' => $request->saldo,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/keuanganRW')->with('success', 'Data Transaksi berhasil diubah');
    }

    public function destroy(String $id){
        $check = KeuanganRW::find($id);
        if (!$check) {
            return redirect('/KeuanganRW')->with('error', 'Data Transaksi tidak ditemukan');
        }

        try {
            KeuanganRW::destroy($id);
            return redirect('/keuanganRW')->with('success', 'Data Transaksi berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e) {
            return redirect('/keuanganRW')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    // public function index()
    // {
    //     return view('RW.Keuangan.index');
    // }
    // public function create()
    // {
    //     return view('RW.Keuangan.create');
    // }
    // public function edit(){
    //     return view('RW.Keuangan.edit');
    // }
    // public function show(){
    //     return view('RW.Keuangan.show');
    // }
}

