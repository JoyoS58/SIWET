<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaKos;
use App\Models\RT;
use Illuminate\Http\Request;

class MahasiswaKosController extends Controller
{
    public function index(Request $request)
    {
        $query = MahasiswaKos::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama', 'LIKE', "%$search%")
                  ->orWhere('universitas', 'LIKE', "%$search%")
                  ->orWhere('jurusan', 'LIKE', "%$search%");
        }

        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
            $query->where('universitas', $filter);
        }

        $mahasiswaKos = $query->get();

        $universitas = MahasiswaKos::select('universitas')->distinct()->get();

        return view('RW.MahasiswaKos.index', compact('mahasiswaKos', 'universitas'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|unique:mahasiswa_kos,NIK',
            'id_rt' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'alamatkos' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
        ]);

        MahasiswaKos::create([
            'NIK' => $request->nik,
            'ID_RT' => $request->id_rt,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'alamat_Kos' => $request->alamatkos,
            'jenis_Kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('MahasiswaKos')->with('success', 'Data Mahasiswa Berhasil Disimpan');
    }
    public function create()
    {
        $dataRT = RT::all();
        return view('RW.MahasiswaKos.create', ['RT' => $dataRT]);
    }
    public function edit(string $id)
    {
        $mahasiswaKos = MahasiswaKos::find($id);
        $RT = RT::all();
        return view('RW.MahasiswaKos.edit', ['mahasiswaKos' => $mahasiswaKos, 'RT' => $RT]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required',
            'id_rt' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'alamatkos' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
        ]);

        MahasiswaKos::find($id)->update([
            'NIK' => $request->nik,
            'ID_RT' => $request->id_rt,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->ttl,
            'alamat_Kos' => $request->alamatkos,
            'jenis_Kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('MahasiswaKos')->with('success', 'Data Mahasiswa Berhasil Diubah');
    }
    public function show(string $id)
    {
        $mahasiswaKos = MahasiswaKos::find($id);
        return view('RW.MahasiswaKos.show', ['mahasiswa' => $mahasiswaKos]);
    }

    public function destroy(string $id)
    {
        $check = MahasiswaKos::find($id);
        if (!$check) {
            return redirect('MahasiswaKos')->with('error', 'Data Mahasiswa tidak ditemukan');
        }

        try {
            MahasiswaKos::destroy($id);

            return redirect('MahasiswaKos')->with('success', 'Data Mahasiswa berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('MahasiswaKos')->with('error', 'Data Mahasiswa gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
