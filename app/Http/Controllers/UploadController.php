<?php
namespace App\Http\Controllers;

use App\Models\KegiatanRW;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
    //     ]);

    //     $file = $request->file('file');
    //     $path = $file->store('uploads');

    //     return back()
    //         ->with('success', 'File has been uploaded.')
    //         ->with('path', $path);
    // }
    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'bail|required',
            'gambar' => 'image|max:5000'
        ]);
        $pathBaru = null;
        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'web-'.time().".". $extFile;

            Storage::disk('img_inventaris')->put($namaFile, file_get_contents($imageFile));
            $pathBaru = $namaFile;
            
        }
        KegiatanRW::create([
            'nama' => $request->nama_Kegiatan,
            'gambar' => $pathBaru,
        ]);
    }
}
