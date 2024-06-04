@extends('layouts.templatePKK')
@section('title', 'TOPSIS')

@section('content_header')
<h1>TOPSIS</h1>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan TOPSIS</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Hasil Perhitungan TOPSIS</h1>

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

        <h2 class="mt-4">Matriks Terbobot</h2>
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
                            @foreach($terbobotMatriks[$index] as $nilai)
                                <td>{{ $nilai }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Solusi Ideal</h2>
        <h3 class="mt-3">Ideal Positif</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        @foreach($kriteria as $kri)
                            <th>{{ $kri->nama_Kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($idealPositif as $nilai)
                            <td>{{ $nilai }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="mt-3">Ideal Negatif</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        @foreach($kriteria as $kri)
                            <th>{{ $kri->nama_Kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($idealNegatif as $nilai)
                            <td>{{ $nilai }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Jarak Terhadap Solusi Ideal</h2>
        <h3 class="mt-3">Jarak Positif</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        <th>Jarak Positif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $index => $alt)
                        <tr>
                            <td>{{ $alt->nama_alternatif }}</td>
                            <td>{{ $jarakPositif[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mt-3">Jarak Negatif</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        <th>Jarak Negatif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $index => $alt)
                        <tr>
                            <td>{{ $alt->nama_alternatif }}</td>
                            <td>{{ $jarakNegatif[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Perangkingan</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Ranking</th>
                        <th>Alternatif</th>
                        <th>Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peringkat as $rank)
                        <tr>
                            <td>{{ $rank['ranking'] }}</td>
                            <td>{{ $rank['alternatif'] }}</td>
                            <td>{{ $rank['skor'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection