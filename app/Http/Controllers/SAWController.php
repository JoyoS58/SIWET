<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function calculate(Request $request)
    {
        // Ambil data kriteria
        $kriteria = Kriteria::all();

        // Ambil data alternatif
        $alternatif = Alternatif::all();

        $inputNilai = $request->input('nilai');

        // Hitung dan simpan matriks keputusan
        $matriksKeputusan = $this->store($request, $alternatif, $kriteria);

        // Normalisasi matriks keputusan
        $normalisasiMatriks = $this->normalisasi($matriksKeputusan);

        // Hitung skor akhir
        $skorAkhir = $this->hitungSkor($normalisasiMatriks, $kriteria);

        return view('PKK.SPK.Saw.perhitungan', compact('alternatif', 'kriteria', 'skorAkhir', 'matriksKeputusan', 'normalisasiMatriks'));
    }

    public function store(Request $request, $alternatif, $kriteria)
    {
        // Inisialisasi variabel array
        $matriksKeputusan = [];

        // Periksa apakah request adalah POST dan memiliki data nilai
        if ($request->isMethod('post') && $request->has('nilai')) {
            // Ambil data nilai dari request
            $inputNilai = $request->input('nilai');

            // Iterasi untuk setiap data nilai
            foreach ($inputNilai as $alternatifId => $nilaiKriteria) {
                // Iterasi untuk setiap nilai kriteria dari alternatif tersebut
                foreach ($nilaiKriteria as $kriteriaId => $nilai) {
                    // Simpan nilai ke dalam variabel array matriksKeputusan
                    $matriksKeputusan[$alternatifId][$kriteriaId] = $nilai;
                    echo "$matriksKeputusan[$alternatifId][$kriteriaId]";
                }
            }
        }

        // Lakukan aksi atau operasi lainnya dengan variabel $matriksKeputusan
        // ...

        // Contoh penggunaan variabel $matriksKeputusan
        // Misalnya, tampilkan nilai dari variabel $matriksKeputusan
        return $matriksKeputusan;
    }

    private function normalisasi($matriks)
    {
        $normalisasiMatriks = [];

        // Periksa apakah $matriks tidak kosong
        if (!empty($matriks)) {
            $jmlKriteria = count($matriks[0]);
            $jmlAlternatif = count($matriks);

            // Iterasi setiap kolom (kriteria)
            for ($i = 0; $i < $jmlKriteria; $i++) {
                // Periksa apakah array_column memiliki elemen
                if (!empty(array_column($matriks, $i))) {
                    $max = max(array_column($matriks, $i));
                    $min = min(array_column($matriks, $i));

                    // Iterasi setiap baris (alternatif)
                    for ($j = 0; $j < $jmlAlternatif; $j++) {
                        $normalisasiMatriks[$j][$i] = ($matriks[$j][$i] - $min) / ($max - $min);
                    }
                }
            }
        }

        return $normalisasiMatriks;
    }

    private function hitungSkor($normalisasiMatriks, $kriteria)
    {
        $skorAkhir = [];
        $jmlAlternatif = count($normalisasiMatriks);

        // Pastikan $normalisasiMatriks dan $kriteria tidak kosong
        if (!empty($normalisasiMatriks) && !empty($kriteria)) {
            // Iterasi setiap alternatif
            for ($i = 0; $i < $jmlAlternatif; $i++) {
                $skorAkhir[$i] = 0;
                foreach ($kriteria as $key => $kri) {
                    // Pastikan $normalisasiMatriks[$i] memiliki kunci $key
                    if (isset($normalisasiMatriks[$i][$key])) {
                        $skorAkhir[$i] += $normalisasiMatriks[$i][$key] * $kri->bobot_Kriteria;
                    } else {
                        // Handle jika kunci tidak ditemukan
                        // Misalnya, beri nilai default atau lewati perhitungan ini
                    }
                }
            }
        } else {
            // Handle jika $normalisasiMatriks atau $kriteria kosong
        }

        // Mengurutkan skor akhir secara descending
        arsort($skorAkhir);

        return $skorAkhir;
    }
}