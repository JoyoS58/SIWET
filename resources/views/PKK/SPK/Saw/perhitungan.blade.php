@extends('layouts.templatePKK')
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
@endsection
