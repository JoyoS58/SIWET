<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\RT;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $dataWarga = Warga::all();
        return view('RW.warga.index', compact('dataWarga'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required',
            'id_rt' => 'required',
            'nokk' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_penduduk' => 'required',
        ]);

        Warga::create([
            'NIK' => $request->nik,
            'ID_RT' => $request->id_rt,
            'nomor_KK' => $request->nokk,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jenis_Kelamin' => $request->jenis_kelamin,
            'jenis_Penduduk' => $request->jenis_penduduk,
        ]);

        return redirect('Warga')->with('success', 'Data Warga Berhasil Disimpan');
    }
    public function create()
    {
        $dataRT = RT::all();
        return view('RW.warga.create',['RT' => $dataRT]);
    }
    public function edit(string $id)
    {
        $Warga = Warga::find($id);
        $RT = RT::all();
        return view('RW.warga.edit', ['Warga' => $Warga,'RT' => $RT]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required',
            'id_rt' => 'required',
            'nokk' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_penduduk' => 'required',
        ]);

        Warga::find($id)->update([
            'NIK' => $request->nik,
            'ID_RT' => $request->id_rt,
            'nomor_KK' => $request->nokk,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jenis_Kelamin' => $request->jenis_kelamin,
            'jenis_Penduduk' => $request->jenis_penduduk,
        ]);

        return redirect('Warga')->with('success', 'Data Warga Berhasil Diubah');
    }
    public function show(string $id)
    {
        $Warga = Warga::find($id);
        return view('RW.warga.show', ['Warga' => $Warga]);
    }

    public function destroy(string $id)
    {
        $check = Warga::find($id);
        if (!$check) {
            return redirect('Warga')->with('error', 'Data Warga tidak ditemukan');
        }

        try {
            Warga::destroy($id);

            return redirect('Warga')->with('success', 'Data Warga berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('Warga')->with('error', 'Data Warga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
