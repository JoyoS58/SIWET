<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganRW;
use App\Models\RW;
use Yajra\DataTables\Facades\DataTables;



class KeuanganRWController extends Controller
{
    public function index(Request $request)
    {
        $query = KeuanganRW::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('ID_Transaksi', 'LIKE', "%$search%")
                  ->orWhere('jenis_Transaksi', 'LIKE', "%$search%")
                  ->orWhere('deskripsi', 'LIKE', "%$search%");
        }

        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
            $query->where('jenis_Transaksi', $filter);
        }

        $dataKeuangan = $query->get();
        $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

        // Calculate saldo for each transaction
        foreach ($dataKeuangan as $KeuanganRw) {
            $KeuanganRw->saldo == $saldoAwal;
            $saldoAwal += ($KeuanganRw->jenis_Transaksi == 'Pemasukan' ? 1 : -1) * $KeuanganRw->nominal;
        }

        $jenisTransaksi = KeuanganRW::select('jenis_Transaksi')->distinct()->get();

        return view('RW.Keuangan.index', compact('dataKeuangan', 'jenisTransaksi'));
    }

public function store(Request $request)
{
    $validate = $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal_Transaksi' => 'required',
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
    KeuanganRW::create([
        'ID_RW' => 1,
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $request->nominal,
        'tanggal_Transaksi' => $request->tanggal_Transaksi,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('KeuanganRW')->with('success', 'Data Keuangan Berhasil Disimpan');
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
        $KeuanganRW = KeuanganRW::find($id);
        $RW = RW::all();
        return view('RW.Keuangan.edit', ['KeuanganRW' => $KeuanganRW,'RW' => $RW]);
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'jenis_Transaksi' => 'required',
        'nominal' => 'required',
        'tanggal_Transaksi' =>'required',
        'deskripsi' => 'required',
    ]);

    $KeuanganRW = KeuanganRW::find($id);
    if (!$KeuanganRW) {
        return redirect('KeuanganRW')->with('error', 'Data Keuangan tidak ditemukan');
    }

    $saldoAwal = $this->getSaldoAwal(); // Get the initial balance

    $newNominal = $request->nominal;
    $oldNominal = $KeuanganRW->nominal;
    $jenisTransaksi = $request->jenis_Transaksi;

    $newSaldo = $this->calculateSaldoForUpdate($saldoAwal, $jenisTransaksi, $oldNominal, $newNominal);

    $KeuanganRW->update([
        'jenis_Transaksi' => $request->jenis_Transaksi,
        'nominal' => $newNominal,
        'tanggal_Transaksi' => $request->tanggal_Transaksi,
        'deskripsi' => $request->deskripsi,
        'saldo' => $newSaldo,
    ]);

    return redirect('KeuanganRW')->with('success', 'Data Keuangan Berhasil Diubah');
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
        $KeuanganRW = KeuanganRW::find($id);
        return view('RW.Keuangan.show', ['KeuanganRW' => $KeuanganRW]);
    }
    public function destroy(string $id)
    {
        $check = KeuanganRW::find($id);
        if (!$check) {
            return redirect('KeuanganRW')->with('error', 'Data Keuangan tidak ditemukan');
        }
        try {
            KeuanganRW::destroy($id);

            return redirect('KeuanganRW')->with('success', 'Data Keuangan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('KeuanganRW')->with('error', 'Data Keuangan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}

