@extends('layouts.templatePKK')
@section('title', 'Input Nilai & Hasil Perhitungan SAW')

@section('content_header')
    <h1>Input Nilai Alternatif & Hasil Perhitungan SAW</h1>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hasil Perhitungan SAW</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Tombol untuk membuka modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputNilaiModal">
        Input Nilai Alternatif
    </button>

    <!-- Modal -->
    <div class="modal fade" id="inputNilaiModal" tabindex="-1" role="dialog" aria-labelledby="inputNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputNilaiModalLabel">Input Nilai Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="ID_alternatif" class="form-label">Pilih Alternatif</label>
                            <select name="ID_alternatif" id="ID_alternatif" class="form-control" required>
                                @foreach ($alternatif as $alt)
                                    <option value="{{ $alt->ID_alternatif }}">{{ $alt->nama_alternatif }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach ($kriteria as $kri)
                            <div class="mb-3">
                                <label for="nilai_{{ $kri->ID_Kriteria }}" class="form-label">{{ $kri->nama_Kriteria }}</label>
                                <input type="number" name="nilai[{{ $kri->ID_Kriteria }}]" id="nilai_{{ $kri->ID_Kriteria }}" class="form-control" required>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilkan matriks keputusan -->
    <div class="mt-5">
        <h2>Matriks Keputusan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteria as $kri)
                        <th>{{ $kri->nama_Kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if (!empty($matriksKeputusan))
                    @foreach ($alternatif as $alt)
                        @if (array_filter($matriksKeputusan[$alt->ID_alternatif]))
                            <tr>
                                <td>{{ $alt->nama_alternatif }}</td>
                                @foreach ($kriteria as $kri)
                                    <td>{{ $matriksKeputusan[$alt->ID_alternatif][$kri->ID_Kriteria] ?? 0 }}</td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count($kriteria) + 1 }}">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Tampilkan matriks normalisasi -->
    <div class="mt-5">
        <h2>Matriks Normalisasi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteria as $kri)
                        <th>{{ $kri->nama_Kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if (!empty($normalisasiMatriks))
                    @foreach ($alternatif as $alt)
                        @if (array_filter($normalisasiMatriks[$alt->ID_alternatif]))
                            <tr>
                                <td>{{ $alt->nama_alternatif }}</td>
                                @foreach ($kriteria as $kri)
                                    <td>{{ $normalisasiMatriks[$alt->ID_alternatif][$kri->ID_Kriteria] ?? 0 }}</td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count($kriteria) + 1 }}">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Hasil Perhitungan SAW -->
    <div class="mt-5">
        <h2>Hasil Perhitungan SAW</h2>
        {{-- @dd($skorAkhir) --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Alternatif</th>
                    <th>Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                @if ($skorAkhir)
                    @php
                        $ranking = 1; // Inisialisasi peringkat
                        $highestScore = max($skorAkhir); // Mendapatkan skor tertinggi
                    @endphp
                    @foreach ($skorAkhir as $alt_id => $skor)
                        <tr>
                            <td>{{ $ranking++ }}</td>
                            <td>{{ $alternatif->firstWhere('ID_alternatif', $alt_id)->nama_alternatif }}</td>
                            <td>{{ number_format($skor, 2) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
