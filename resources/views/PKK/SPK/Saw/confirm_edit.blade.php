<h2 class="mt-4">Matriks Keputusan</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($kriteria as $kri)
                            <th>{{ $kri->nama_Kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $index => $alt)
                        <tr>
                            <td>{{ $alt->nama_alternatif }}</td>
                            @foreach($matriksKeputusan[$index] as $nilai)
                                <td>{{ $nilai }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Matriks Normalisasi</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($kriteria as $kri)
                            <th>{{ $kri->nama_Kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $index => $alt)
                        <tr>
                            <td>{{ $alt->nama_alternatif }}</td>
                            @foreach($normalisasiMatriks[$index] as $nilai)
                                <td>{{ $nilai }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

ubah agar dapat mengabil nilai seperti kode program yang saya kirim sebelumnya
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;

class TopsisController extends Controller
{
    public function index()
    {
        // Ambil data kriteria
        $kriteria = Kriteria::all();

        // Ambil data alternatif
        $alternatif = Alternatif::all();

        $jumlahKriteria = $kriteria->count();
        $jumlahAlternatif = $alternatif->count();

        // Nilai matriks keputusan (statis)
        $matriksKeputusan = [];
        for ($i = 0; $i < $jumlahAlternatif; $i++) {
            for ($j = 0; $j < $jumlahKriteria; $j++) {
                $matriksKeputusan[$i][$j] = rand(1, 10);
            }
        }

        // Normalisasi matriks keputusan
        $normalisasiMatriks = $this->normalisasi($matriksKeputusan);

        // Hitung matriks terbobot
        $terbobotMatriks = $this->terbobot($normalisasiMatriks, $kriteria);

        // Hitung solusi ideal positif dan negatif
        list($idealPositif, $idealNegatif) = $this->solusiIdeal($terbobotMatriks);

        // Hitung jarak ke solusi ideal positif dan negatif
        $jarakPositif = $this->jarakIdeal($terbobotMatriks, $idealPositif);
        $jarakNegatif = $this->jarakIdeal($terbobotMatriks, $idealNegatif);

        // Hitung nilai preferensi
        $nilaiPreferensi = $this->nilaiPreferensi($jarakPositif, $jarakNegatif);

        // Urutkan alternatif berdasarkan nilai preferensi (peringkat)
        arsort($nilaiPreferensi);

        // Buat array peringkat
        $peringkat = [];
        $ranking = 1;
        foreach ($nilaiPreferensi as $key => $value) {
            $peringkat[] = ['ranking' => $ranking++, 'alternatif' => $alternatif[$key]->nama_alternatif, 'skor' => $value];
        }

        return view('PKK.SPK.topsis.perhitungan', compact('alternatif', 'kriteria', 'matriksKeputusan', 'normalisasiMatriks', 'terbobotMatriks', 'idealPositif', 'idealNegatif', 'jarakPositif', 'jarakNegatif', 'nilaiPreferensi', 'peringkat'));
    }

    private function normalisasi($matriks)
    {
        $normalisasiMatriks = [];
        $jmlKriteria = count($matriks[0]);
        $jmlAlternatif = count($matriks);

        for ($i = 0; $i < $jmlKriteria; $i++) {
            $pembagi = sqrt(array_sum(array_column($matriks, $i)));
            for ($j = 0; $j < $jmlAlternatif; $j++) {
                $normalisasiMatriks[$j][$i] = $matriks[$j][$i] / $pembagi;
            }
        }

        return $normalisasiMatriks;
    }

    private function terbobot($normalisasiMatriks, $kriteria)
    {
        $terbobotMatriks = [];
        foreach ($normalisasiMatriks as $i => $baris) {
            foreach ($baris as $j => $nilai) {
                $terbobotMatriks[$i][$j] = $nilai * $kriteria[$j]->bobot_Kriteria;
            }
        }
        return $terbobotMatriks;
    }

    private function solusiIdeal($terbobotMatriks)
    {
        $idealPositif = [];
        $idealNegatif = [];

        foreach (array_keys($terbobotMatriks[0]) as $j) {
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

