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

    // Tambahkan atribut saldo pada setiap data keuangan
    foreach ($dataKeuangan as $keuanganRw) {
        $keuanganRw->saldo = $saldoAwal;
    }

    return view('RW.Keuangan.index', compact('dataKeuangan'));
}

public function store(Request $request)
{
    $validate = $request->validate([
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
        return view('RW.Keuangan.edit', ['keuanganRW' => $keuanganRW,'RW' => $RW]);
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal_Transaksi' =>'required',
        'deskripsi' => 'required',
    ]);

    $keuanganRW = KeuanganRW::find($id);
    if (!$keuanganRW) {
        return redirect('keuanganRW')->with('error', 'Data Keuangan tidak ditemukan');
    }

    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    $newNominal = $request->nominal;
    $oldNominal = $keuanganRW->nominal;
    $jenisTransaksi = $request->jenis_Transaksi;

    $newSaldo = $this->calculateSaldoForUpdate($saldoAwal, $jenisTransaksi, $oldNominal, $newNominal);

    $keuanganRW->update([
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $newNominal,
        'tanggal_Transaksi' => $request->tanggal_Transaksi,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('keuanganRW')->with('success', 'Data Keuangan Berhasil Diubah');
}

private function calculateSaldoForUpdate($saldoAwal, $jenisTransaksi, $oldNominal, $newNominal)
{
    if ($jenisTransaksi === 'Pemasukan') {
        $saldoDifference = $newNominal - $oldNominal;
        $newSaldo = $saldoAwal + $saldoDifference;
    } else {
        $saldoDifference = $oldNominal - $newNominal;
        $newSaldo = $saldoAwal - $saldoDifference;
    }

    return $newSaldo;
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
}

