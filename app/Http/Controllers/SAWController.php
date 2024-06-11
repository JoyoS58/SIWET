<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function calculate(Request $request)
{
    // Ambil data kriteria
    $kriteria = Kriteria::all();

    // Ambil data alternatif
    $alternatif = Alternatif::all();

    // Jika ada data baru yang ditambahkan melalui input, hapus nilai-nilai lama dan ganti dengan nilai-nilai baru
    if ($request->has('ID_alternatif')) {
        $ID_alternatif_baru = $request->ID_alternatif;
        $inputNilai = $request->nilai;

        // Hapus nilai-nilai lama dari database untuk pasangan ID alternatif dan ID kriteria yang sama
        foreach ($inputNilai as $ID_Kriteria => $nilai) {
            Nilai::where('ID_alternatif', $ID_alternatif_baru)
                ->where('ID_Kriteria', $ID_Kriteria)
                ->delete();
        }

        // Simpan nilai-nilai baru ke database
        foreach ($inputNilai as $ID_Kriteria => $nilai) {
            Nilai::create([
                'ID_alternatif' => $ID_alternatif_baru,
                'ID_Kriteria' => $ID_Kriteria,
                'nilai' => $nilai,
            ]);
        }
    }

    // Nilai matriks keputusan
    $matriksKeputusan = [];

    // Update matriks keputusan dengan nilai baru yang ada di database
    foreach ($alternatif as $alt) {
        foreach ($kriteria as $kri) {
            $nilai = Nilai::where('ID_alternatif', $alt->ID_alternatif)
                          ->where('ID_Kriteria', $kri->ID_Kriteria)
                          ->first();
            $matriksKeputusan[$alt->ID_alternatif][$kri->ID_Kriteria] = $nilai ? $nilai->nilai : 0;
        }
    }

    // Normalisasi matriks keputusan
    $normalisasiMatriks = $this->normalisasi($matriksKeputusan);

    // Hitung skor akhir
    $skorAkhir = $this->hitungSkor($normalisasiMatriks, $kriteria);

    return view('PKK.SPK.Saw.perhitungan', compact('alternatif', 'kriteria', 'skorAkhir', 'matriksKeputusan', 'normalisasiMatriks'));
}

    private function normalisasi($matriks)
{
    $normalisasiMatriks = [];
    $jmlKriteria = 0;
    if (!empty($matriks)) {
        $firstKey = array_key_first($matriks);
        if ($firstKey !== null && isset($matriks[$firstKey])) {
            $jmlKriteria = count($matriks[$firstKey]);
        }
    }

    $jmlAlternatif = count($matriks);

    // Iterasi setiap kolom (kriteria)
    foreach ($matriks as $alt_id => $nilaiKriteria) {
        foreach ($nilaiKriteria as $kri_id => $nilai) {
            $nilaiKolom[$kri_id][] = $nilai;
        }
    }

    foreach ($nilaiKolom as $kri_id => $kolom) {
        $totalKolom = array_sum($kolom);

        // Hindari pembagian dengan nol
        if ($totalKolom == 0) {
            $totalKolom = 1;
        }

        // Iterasi setiap baris (alternatif)
        foreach ($matriks as $alt_id => $nilaiKriteria) {
            // Periksa apakah nilai untuk kolom saat ini ada
            if (isset($nilaiKriteria[$kri_id])) {
                // Lakukan normalisasi dengan rumus SAW
                $normalisasiMatriks[$alt_id][$kri_id] = $nilaiKriteria[$kri_id] / $totalKolom;
            } else {
                // Jika tidak, beri nilai default 0
                $normalisasiMatriks[$alt_id][$kri_id] = 0;
            }
        }
    }

    return $normalisasiMatriks;
}


private function hitungSkor($normalisasiMatriks, $kriteria)
{
    $skorAkhir = [];

    // Iterasi setiap alternatif
    foreach ($normalisasiMatriks as $alt_id => $nilai) {
        $totalSkor = 0;
        foreach ($kriteria as $kri) {
            // Pastikan nilai kriteria tersedia untuk alternatif tertentu
            if (isset($nilai[$kri->ID_Kriteria])) {
                $totalSkor += $nilai[$kri->ID_Kriteria] * $kri->bobot_Kriteria;
            }
        }
        
        // Periksa apakah skor akhir tidak sama dengan 0
        if ($totalSkor != 0) {
            $skorAkhir[$alt_id] = $totalSkor;
        }
    }

    // Mengurutkan skor akhir secara descending
    arsort($skorAkhir);

    return $skorAkhir;
}


    public function create()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        return view('nilai.create', compact('alternatif', 'kriteria'));
    }

    public function store(Request $request)
{
    $request->validate([
        'ID_alternatif' => 'required|exists:alternatif,ID_alternatif',
        'nilai' => 'required|array',
        'nilai.*' => 'required|numeric',
    ]);

    $ID_alternatif = $request->ID_alternatif;

    // Loop melalui nilai-nilai yang dikirimkan dalam permintaan
    foreach ($request->nilai as $ID_Kriteria => $nilai) {
        // Update atau buat entri baru dalam tabel Nilai
        Nilai::updateOrCreate(
            // Kriteria pencarian
            ['ID_alternatif' => $ID_alternatif, 'ID_Kriteria' => $ID_Kriteria],
            // Data yang akan disimpan atau diperbarui
            ['nilai' => $nilai]
        );
    }

    return redirect()->route('saw.calculate')->with('success', 'Nilai alternatif berhasil disimpan.');
}



}
