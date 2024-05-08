<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganRW;
use App\Models\RW;
use Yajra\DataTables\Facades\DataTables;



class KeuanganRWController extends Controller
{
    public function index()
{
    $dataKeuangan = KeuanganRW::all();
    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance
    $dataKeuangan->saldo = $saldoAwal;
    return view('RW.Keuangan.index', compact('dataKeuangan'));
}

public function store(Request $request)
{
    $validate = $request->validate([
        'ID_Transaksi' => 'required',
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal_Transaksi' => 'required',
        'deskripsi' => 'required',
    ]);

    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    $newSaldo = $this->calculateSaldo($saldoAwal, $request->jenis_Transaksi, $request->nominal);

    KeuanganRW::create([
        'ID_RW' => 1,
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $request->nominal,
        'tanggal_Transaksi' => $request->tanggal_Transaksi,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo, // Update saldo with the new calculated value
    ]);

    return redirect('keuanganRW')->with('success', 'Data Keuangan Berhasil Disimpan');
}

private function getSaldoAwal()
{
    $saldoAwal = KeuanganRW::orderBy('ID_Transaksi', 'desc')->first()->saldo ?? 0; // Get the last recorded saldo, if any, or set it to 0
    return $saldoAwal;
}

private function calculateSaldo($saldoAwal, $jenisTransaksi, $nominal)
{
    if ($jenisTransaksi === 'Pemasukan') {
        $newSaldo = $saldoAwal + $nominal;
    } else {
        $newSaldo = $saldoAwal - $nominal;
    }

    return $newSaldo;
}
    public function create()
    {
        $dataRW = RW::all();
        return view('RW.Keuangan.create',['RW' => $dataRW]);
    }
    public function edit(string $id)
    {
        $keuanganRW = KeuanganRW::find($id);
        $RW = RW::all();
        return view('RW.Kegiatan.edit', ['keuanganRW' => $keuanganRW,'RW' => $RW]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Transaksi' => 'required',
            'jenis_Transaksi' => 'required',
            'nominal' => 'required',
            'tanggal_Transaksi' =>'required',
            'deskripsi' => 'required',
        ]);

        KeuanganRW::find($id)->update([
            // 'ID_RW' =>  $request->ID_RW,
            'ID_Transaksi' => $request->ID_Transaksi,
            'jenis_Transaksi' => $request->jenis_Transaksi,
            'nominal' => $request->nominal,
            'tanggal_Transaksi' => $request->tanggal_Transaksi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('keuanganRW')->with('success', 'Data Keuangan Berhasil Diubah');
    }
    public function show(string $id)
    {
        $keuanganRW = KeuanganRW::find($id);
        return view('RW.Keuangan.show', ['keuanganRW' => $keuanganRW]);
    }
    public function destroy(string $id)
    {
        $check = KeuanganRW::find($id);
        if (!$check) {
            return redirect('keuanganRW')->with('error', 'Data Keuangan tidak ditemukan');
        }
        try {
            KeuanganRW::destroy($id);

            return redirect('keuanganRW')->with('success', 'Data Keuangan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('keuanganRW')->with('error', 'Data Keuangan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
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

