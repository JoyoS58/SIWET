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

        // Check if search input is present and not empty
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                  ->orWhere('universitas', 'LIKE', "%$search%")
                  ->orWhere('jurusan', 'LIKE', "%$search%");
            });
        }

        // Check if filter input is present and not empty
        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
            $query->where('alamat_Kos', $filter);
        }

        // Get the filtered and searched data
        $MahasiswaKos = $query->get();

        // Get distinct universities for the filter dropdown
        $alamatKos = MahasiswaKos::select('alamat_Kos')->distinct()->get();

        // Return the view with the data
        return view('RW.MahasiswaKos.index', compact('MahasiswaKos', 'alamatKos'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'NIK' => 'required|unique:Mahasiswa_Kos,NIK',
            'ID_RT' => 'required',
            'nama' => 'required',
            'tempat_Tanggal_Lahir' => 'required',
            'alamatKos' => 'required',
            'jenis_Kelamin' => 'required',
            'agama' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
        ]);

        MahasiswaKos::create([
            'NIK' => $request->NIK,
            'ID_RT' => $request->ID_RT,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->tempat_Tanggal_Lahir,
            'alamat_Kos' => $request->alamatKos,
            'jenis_Kelamin' => $request->jenis_Kelamin,
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
        $MahasiswaKos = MahasiswaKos::find($id);
        $RT = RT::all();
        return view('RW.MahasiswaKos.edit', ['MahasiswaKos' => $MahasiswaKos, 'RT' => $RT]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'NIK' => 'required',
            'ID_RT' => 'required',
            'nama' => 'required',
            'tempat_Tanggal_Lahir' => 'required',
            'alamatKos' => 'required',
            'jenis_Kelamin' => 'required',
            'agama' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
        ]);

        MahasiswaKos::find($id)->update([
            'NIK' => $request->NIK,
            'ID_RT' => $request->ID_RT,
            'nama' => $request->nama,
            'tempat_Tanggal_Lahir' => $request->tempat_Tanggal_Lahir,
            'alamat_Kos' => $request->alamatKos,
            'jenis_Kelamin' => $request->jenis_Kelamin,
            'agama' => $request->agama,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('MahasiswaKos')->with('success', 'Data Mahasiswa Berhasil Diubah');
    }
    public function show(string $id)
    {
        $MahasiswaKos = MahasiswaKos::find($id);
        return view('RW.MahasiswaKos.show', ['Mahasiswa' => $MahasiswaKos]);
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
