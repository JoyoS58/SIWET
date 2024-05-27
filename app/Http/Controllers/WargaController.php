<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\RT;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Warga::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                  ->orWhere('tempat_Tanggal_Lahir', 'LIKE', "%$search%")
                  ->orWhere('alamat', 'LIKE', "%$search%")
                  ->orWhere('pekerjaan', 'LIKE', "%$search%");
            });
        }

        if ($request->has('filter') && $request->filter != 'Semua') {
            $filter = $request->filter;
            $query->where('jenis_Penduduk', $filter);
        }

        $dataWarga = $query->get();

        $jenisPenduduk = Warga::select('jenis_Penduduk')->distinct()->get();

        return view('RW.warga.index', compact('dataWarga', 'jenisPenduduk'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'NIK' => 'required|unique:Warga,NIK',
            'id_RT' => 'required',
            'nokk' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_Kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_Penduduk' => 'required',
        ]);

        Warga::create([
            'NIK' => $request->NIK,
            'ID_RT' => $request->id_RT,
            'nomor_KK' => $request->nokk,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jenis_Kelamin' => $request->jenis_Kelamin,
            'jenis_Penduduk' => $request->jenis_Penduduk,
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
            'NIK' => 'required',
            'id_RT' => 'required',
            'nokk' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_Kelamin' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'jenis_Penduduk' => 'required',
        ]);

        Warga::find($id)->update([
            'NIK' => $request->NIK,
            'ID_RT' => $request->id_RT,
            'nomor_KK' => $request->nokk,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jenis_Kelamin' => $request->jenis_Kelamin,
            'jenis_Penduduk' => $request->jenis_Penduduk,
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
