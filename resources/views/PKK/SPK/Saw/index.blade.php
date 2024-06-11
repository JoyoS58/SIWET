{{-- @extends('layouts.templatePKK')
@section('title', 'SAW')

@section('content_header')
<h1>SAW</h1>
@endsection

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan SAW</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Hasil Perhitungan SAW</h1>

        <div class="mt-5">
            <h2>Matriks Keputusan</h2>
            <table class="table table-bordered">
                <thead>
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

        <div class="mt-5">
            <h2>Matriks Normalisasi</h2>
            <table class="table table-bordered">
                <thead>
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

        <div class="mt-5">
            <h2>Perangkingan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ranking</th>
            <th>Alternatif</th>
            <th>Skor Akhir</th>
        </tr>
    </thead>
    <tbody>
        @php
        $ranking = 1; // Inisialisasi peringkat
        $highestScore = max($skorAkhir); // Mendapatkan skor tertinggi
        @endphp
        @foreach($skorAkhir as $index => $skor)
        <tr>
            <td>{{ $skor == $highestScore ? 1 : ++$ranking }}</td> <!-- Jika skor adalah skor tertinggi, maka beri peringkat 1, jika tidak, tambahkan peringkat sebelumnya -->
            <td>{{ $alternatif[$index]->nama_alternatif }}</td>
            <td>{{ number_format($skor, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

        
        
    </div>
</body>
</html>
@endsection --}}

@extends('layouts.templatePKK')
@section('title', 'Input Nilai & Hasil Perhitungan SAW')

@section('content_header')
    <h1>Input Nilai Alternatif & Hasil Perhitungan SAW</h1>
@endsection

@section('content')
<div class="container mt-5">
    <!-- Form Input Nilai Alternatif -->
    <div>
        <h2>Input Nilai Alternatif</h2>
        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ID_alternatif" class="form-label">Pilih Alternatif</label>
                <select name="ID_alternatif" id="ID_alternatif" class="form-control" required>
                    @foreach($alternatif as $alt)
                        <option value="{{ $alt->ID_alternatif }}">{{ $alt->nama_alternatif }}</option>
                    @endforeach
                </select>
            </div>

            @foreach($kriteria as $kri)
                <div class="mb-3">
                    <label for="nilai_{{ $kri->ID_Kriteria }}" class="form-label">{{ $kri->nama_Kriteria }}</label>
                    <input type="number" name="nilai[{{ $kri->ID_Kriteria }}]" id="nilai_{{ $kri->ID_Kriteria }}" class="form-control" required>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Hasil Perhitungan SAW -->
    <div class="mt-5">
        <h2>Hasil Perhitungan SAW</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Alternatif</th>
                    <th>Skor Akhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $ranking = 1; // Inisialisasi peringkat
                $highestScore = max($skorAkhir); // Mendapatkan skor tertinggi
                @endphp
                @foreach($skorAkhir as $alt_id => $skor)
                <tr>
                    <td>{{ $skor == $highestScore ? 1 : ++$ranking }}</td>
                    <td>{{ $alternatif->firstWhere('ID_alternatif', $alt_id)->nama_alternatif }}</td>
                    <td>{{ number_format($skor, 2) }}</td>
                    <td>
                        {{-- <a href="{{ route('nilai.edit', $alt_id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                        {{-- <form action="{{ route('nilai.destroy', $alt_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
