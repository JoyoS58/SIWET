<?php

namespace App\Http\Controllers;

use App\Models\KeuanganPKK;
use App\Models\PKK;
use Illuminate\Http\Request;

class KeuanganPKKController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filterJenis = $request->input('filter_jenis');
    
        $query = KeuanganPKK::query();
    
        if ($search) {
            $query->where('ID_Transaksi', 'LIKE', "%$search%");
        }
    
        if ($filterJenis) {
            $query->where('jenis_Transaksi', $filterJenis);
        }
    
        $dataKeuangan = $query->get();
        $saldoAwal = $this->getSaldoAwal(); // Get the initial balance
    
        // Tambahkan atribut saldo pada setiap data Keuangan
        foreach ($dataKeuangan as $KeuanganPKK) {
            $KeuanganPKK->saldo == $saldoAwal;
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

    return redirect('KeuanganPKK')->with('success', 'Data Keuangan Berhasil Disimpan');
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
        $KeuanganPKK = KeuanganPKK::find($id);
        $PKK = PKK::all();
        return view('PKK.Keuangan.edit', ['KeuanganPKK' => $KeuanganPKK,'PKK' => $PKK]);
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal' =>'required',
        'deskripsi' => 'required',
    ]);

    $KeuanganPKK = KeuanganPKK::find($id);
    if (!$KeuanganPKK) {
        return redirect('KeuanganPKK')->with('error', 'Data Keuangan tidak ditemukan');
    }

    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    $newNominal = $request->nominal;
    $oldNominal = $KeuanganPKK->nominal;
    $jenisTransaksi = $request->jenis_Transaksi;

    $newSaldo = $this->calculateSaldoForUpdate($saldoAwal, $jenisTransaksi, $oldNominal, $newNominal);

    $KeuanganPKK->update([
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $newNominal,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('KeuanganPKK')->with('success', 'Data Keuangan Berhasil Diubah');
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
        $KeuanganPKK = KeuanganPKK::find($id);
        return view('PKK.Keuangan.show', ['KeuanganPKK' => $KeuanganPKK]);
    }
    public function destroy(string $id)
    {
        $check = KeuanganPKK::find($id);
        if (!$check) {
            return redirect('KeuanganPKK')->with('error', 'Data Keuangan tidak ditemukan');
        }
        try {
            KeuanganPKK::destroy($id);

            return redirect('KeuanganPKK')->with('success', 'Data Keuangan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('KeuanganPKK')->with('error', 'Data Keuangan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

}
