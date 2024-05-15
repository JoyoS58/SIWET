<?php

namespace App\Http\Controllers;

use App\Models\KeuanganPKK;
use App\Models\PKK;
use Illuminate\Http\Request;

class KeuanganPKKController extends Controller
{
    public function index()
{
    $dataKeuangan = KeuanganPKK::all();
    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    // Tambahkan atribut saldo pada setiap data keuangan
    foreach ($dataKeuangan as $keuanganPKK) {
        $keuanganPKK->saldo = $saldoAwal;
    }

    return view('PKK.Keuangan.index', compact('dataKeuangan'));
}

public function store(Request $request)
{
    $validate = $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal' => 'required',
        'deskripsi' => 'required',
    ]);

    // Get the initial balance
    $saldoAwal = $this->getSaldoAwal();

    // Calculate new saldo
    $newSaldo = $this->calculateSaldo($saldoAwal, $request->jenis_Transaksi, $request->nominal);

    // If the transaction is a withdrawal and the balance is insufficient, redirect back with an error message
    if ($request->jenis_Transaksi === 'Pengeluaran' && $newSaldo < 0) {
        return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk melakukan pengeluaran.');
    }

    // Save the transaction
    KeuanganPKK::create([
        'ID_Pengurus' => 1,
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $request->nominal,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('keuanganPKK')->with('success', 'Data Keuangan Berhasil Disimpan');
}


private function getSaldoAwal()
{
    $saldoAwal = KeuanganPKK::orderBy('ID_Transaksi', 'desc')->first()->saldo ?? 0; // Get the last recorded saldo, if any, or set it to 0
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
        $dataPKK = PKK::all();
        return view('PKK.Keuangan.create',['PKK' => $dataPKK]);
    }
    public function edit(string $id)
    {
        $keuanganPKK = KeuanganPKK::find($id);
        $PKK = PKK::all();
        return view('PKK.Keuangan.edit', ['keuanganPKK' => $keuanganPKK,'PKK' => $PKK]);
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal' =>'required',
        'deskripsi' => 'required',
    ]);

    $keuanganPKK = KeuanganPKK::find($id);
    if (!$keuanganPKK) {
        return redirect('keuanganPKK')->with('error', 'Data Keuangan tidak ditemukan');
    }

    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    $newNominal = $request->nominal;
    $oldNominal = $keuanganPKK->nominal;
    $jenisTransaksi = $request->jenis_Transaksi;

    $newSaldo = $this->calculateSaldoForUpdate($saldoAwal, $jenisTransaksi, $oldNominal, $newNominal);

    $keuanganPKK->update([
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $newNominal,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('keuanganPKK')->with('success', 'Data Keuangan Berhasil Diubah');
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
        $keuanganPKK = KeuanganPKK::find($id);
        return view('PKK.Keuangan.show', ['keuanganPKK' => $keuanganPKK]);
    }
    public function destroy(string $id)
    {
        $check = KeuanganPKK::find($id);
        if (!$check) {
            return redirect('keuanganPKK')->with('error', 'Data Keuangan tidak ditemukan');
        }
        try {
            KeuanganPKK::destroy($id);

            return redirect('keuanganPKK')->with('success', 'Data Keuangan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('keuanganPKK')->with('error', 'Data Keuangan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // public function index()
    // {
    //     return view('PKK.Keuangan.index');
    // }
    // public function create()
    // {
    //     return view('PKK.Keuangan.create');
    // }
    // public function edit(){
    //     return view('PKK.Keuangan.edit');
    // }
    // public function show(){
    //     return view('PKK.Keuangan.show');
    // }
}
