<?php

namespace App\Http\Controllers;

use App\Models\RT;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RTController extends Controller
{
    public function index(Request $request)
    {
        $query = RT::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('ketua_RT', 'LIKE', "%$search%")
                  ->orWhere('sekretaris_RT', 'LIKE', "%$search%")
                  ->orWhere('bendahara_RT', 'LIKE', "%$search%")
                  ->orWhere('nomor_RT', 'LIKE', "%$search%");
        }

        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
            $query->where('nomor_RT', $filter);
        }

        $dataRT = $query->get();
        $nomorRT = RT::select('nomor_RT')->distinct()->get();

        return view('RW.RT.index', compact('dataRT', 'nomorRT'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'ketua_rt' => 'required',
            'sekretaris_rt' => 'required',
            'bendahara_rt' => 'required',
            'nomor_rt' => 'required|unique:RT,nomor_RT',
        ]);
    
        RT::create([
            'ID_RW' => '1',
            'ketua_RT' => $request->ketua_rt,
            'sekretaris_RT' => $request->sekretaris_rt,
            'bendahara_RT' => $request->bendahara_rt,
            'nomor_RT' => $request->nomor_rt,
        ]);
    
        return redirect('/RT')->with('success', 'Data RT Berhasil Disimpan');
    }
    public function create()
    {
        return view('RW.RT.create');
    }
    public function edit(string $id)
    {
        $RT = RT::find($id);
        return view('RW.RT.edit',['RT' => $RT]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'ketua_rt' => 'required',
            'sekretaris_rt' => 'required',
            'bendahara_rt' => 'required',
            'nomor_rt' => 'required|unique:RT,nomor_RT,'.$id.',ID_RT',
        ]);
    
        RT::find($id)->update([
            'ID_RW' => '1',
            'ketua_RT' => $request->ketua_rt,
            'sekretaris_RT' => $request->sekretaris_rt,
            'bendahara_RT' => $request->bendahara_rt,
            'nomor_RT' => $request->nomor_rt,
        ]);
    
        return redirect('/RT')->with('success', 'Data RT Berhasil Diubah');
    }
    public function show(string $id)
    {
        $RT = RT::find($id);
        return view('RW.RT.show',['RT' => $RT]);
    }

    public function destroy(string $id){
        $check = RT::find($id);
        if (!$check) {
            return redirect('/RT')->with('error', 'Data RT tidak ditemukan');
        }

        try {
            RT::destroy($id);

            return redirect('/RT')->with('success', 'Data RT berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/RT')->with('error', 'Data RT gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
