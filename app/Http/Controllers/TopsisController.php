<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Nilai;

class TopsisController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $nilai = Nilai::all();

        $matriksKeputusan = [];
        foreach ($alternatif as $alt) {
            foreach ($kriteria as $kri) {
                $nilaiAlternatif = Nilai::where('ID_alternatif', $alt->ID_alternatif)
                              ->where('ID_Kriteria', $kri->ID_Kriteria)
                              ->first();
                $matriksKeputusan[$alt->ID_alternatif][$kri->ID_Kriteria] = $nilaiAlternatif ? $nilaiAlternatif->nilai : 0;
            }
        }

        if (empty($matriksKeputusan) || empty($matriksKeputusan[array_key_first($matriksKeputusan)])) {
            return view('PKK.SPK.topsis.perhitungan', [
                'message' => 'Matriks keputusan tidak valid atau kosong',
                'alternatif' => $alternatif,
                'kriteria' => $kriteria
            ]);
        }

        $normalisasiMatriks = $this->normalisasi($matriksKeputusan);
        $terbobotMatriks = $this->terbobot($normalisasiMatriks, $kriteria);
        list($idealPositif, $idealNegatif) = $this->solusiIdeal($terbobotMatriks);
        $jarakPositif = $this->jarakIdeal($terbobotMatriks, $idealPositif);
        $jarakNegatif = $this->jarakIdeal($terbobotMatriks, $idealNegatif);
        $nilaiPreferensi = $this->nilaiPreferensi($jarakPositif, $jarakNegatif);
        arsort($nilaiPreferensi);

        $peringkat = [];
        $ranking = 1;
        foreach ($nilaiPreferensi as $key => $value) {
            $peringkat[] = ['ranking' => $ranking++, 'alternatif' => $alternatif->find($key)->nama_alternatif, 'skor' => $value];
        }

        return view('PKK.SPK.topsis.perhitungan', compact('alternatif', 'kriteria', 'matriksKeputusan', 'normalisasiMatriks', 'terbobotMatriks', 'idealPositif', 'idealNegatif', 'jarakPositif', 'jarakNegatif', 'nilaiPreferensi', 'peringkat'));
    }

    private function normalisasi($matriks)
{
    $normalisasiMatriks = [];
    $jmlKriteria = count($matriks[array_key_first($matriks)]);
    $jmlAlternatif = count($matriks);

    for ($i = 0; $i <= $jmlKriteria; $i++) {
        $kolom = array_column($matriks, $i);
        $pembagi = sqrt(array_sum(array_map(function ($x) {
            return pow($x, 2);
        }, $kolom)));

        foreach ($matriks as $j => $baris) {
            $normalisasiMatriks[$j][$i] = $pembagi != 0 ? $matriks[$j][$i] / $pembagi : 0;
        }
    }

    return $normalisasiMatriks;
}

private function terbobot($normalisasiMatriks, $kriteria)
{
    $terbobotMatriks = [];
    foreach ($normalisasiMatriks as $i => $baris) {
        foreach ($baris as $j => $nilai) {
            // Cari model Kriteria berdasarkan ID
            $kriteriaModel = $kriteria->where('ID_Kriteria', $j)->first();
            if ($kriteriaModel) {
                // Jika Kriteria ditemukan, ambil bobotnya
                $bobot = $kriteriaModel->bobot_Kriteria;
                // Kalikan nilai normalisasi dengan bobot
                $terbobotMatriks[$i][$j] = $nilai * $bobot;
            } else {
                // Jika Kriteria tidak ditemukan, berikan pesan kesalahan atau nilai default
                // Contoh: $terbobotMatriks[$i][$j] = 0; atau throw new Exception('Kriteria not found.');
                // Atau tambahkan penanganan kasus ini sesuai dengan kebutuhan aplikasi Anda
            }
        }
    }
    return $terbobotMatriks;
}


    private function solusiIdeal($terbobotMatriks)
    {
        $idealPositif = [];
        $idealNegatif = [];

        foreach (array_keys($terbobotMatriks[array_key_first($terbobotMatriks)]) as $j) {
            $col = array_column($terbobotMatriks, $j);
            $idealPositif[$j] = max($col);
            $idealNegatif[$j] = min($col);
        }

        return [$idealPositif, $idealNegatif];
    }

    private function jarakIdeal($terbobotMatriks, $ideal)
    {
        $jarak = [];
        foreach ($terbobotMatriks as $i => $baris) {
            $jarak[$i] = sqrt(array_sum(array_map(
                function ($x, $y) {
                    return pow($x - $y, 2);
                },
                $baris,
                $ideal
            )));
        }
        return $jarak;
    }

    private function nilaiPreferensi($jarakPositif, $jarakNegatif)
    {
        $nilaiPreferensi = [];
        foreach (array_keys($jarakPositif) as $i) {
            $nilaiPreferensi[$i] = $jarakNegatif[$i] / ($jarakNegatif[$i] + $jarakPositif[$i]);
        }
        return $nilaiPreferensi;
    }
}
