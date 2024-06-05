@extends('layouts.templatePKK')
@section('title', 'SAW')

@section('content_header')
    <h1>SAW</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Hasil Perhitungan SAW</h1>

        <div class="mt-5">
    <h2>Input Nilai Kriteria</h2>
    <!-- Add a button to trigger the form filling -->
<!-- Your form code -->
<form action="{{ route('SPK.calculate') }}" method="post" id="sawForm">
    @csrf
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
            @foreach($alternatif as $alt)
                <tr>
                    <td>{{ $alt->nama_alternatif }}</td>
                    @foreach($kriteria as $kri)
                        <td>
                            <input type="hidden" name="alternatif[]" value="{{ $alt->id }}">
                            <input type="hidden" name="kriteria[]" value="{{ $kri->id }}">
                            <input type="number" name="nilai[{{ $alt->id }}][{{ $kri->id }}]" min="1" max="5" class="form-control">
                            <button type="button" onclick="setNilai(this, 1)">1</button>
                            <button type="button" onclick="setNilai(this, 2)">2</button>
                            <button type="button" onclick="setNilai(this, 3)">3</button>
                            <button type="button" onclick="setNilai(this, 4)">4</button>
                            <button type="button" onclick="setNilai(this, 5)">5</button>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
    function setNilai(button, value) {
        let input = button.parentElement.querySelector('input[type="number"]');
        input.value = value;
    }
</script>

        <div class="mt-5">
            <h2>Matriks Keputusan</h2>
            <table class="table table-bordered table-striped">
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
                            @if(isset($matriksKeputusan[$index]) && is_array($matriksKeputusan[$index]))
                                @foreach($matriksKeputusan[$index] as $nilai)
                                    <td>{{ $nilai }}</td>
                                @endforeach
                            @else
                                <td colspan="jumlah_kolom">Data tidak tersedia</td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <h2>Matriks Normalisasi</h2>
            <table class="table table-bordered table-striped">
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
                            @if(isset($normalisasiMatriks[$index]) && is_array($normalisasiMatriks[$index]))
                        @foreach($normalisasiMatriks[$index] as $nilai)
                            <td>{{ $nilai }}</td>
                        @endforeach
                    @else
                        <td colspan="jumlah_kolom">Data tidak tersedia</td>
                    @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <h2>Perangkingan</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Alternatif</th>
                        <th>Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($skorAkhir) && !empty($alternatif))
                        @php
                            $highestScore = max($skorAkhir); // Mendapatkan skor tertinggi
                            $ranking = 1; // Inisialisasi peringkat
                        @endphp

                        @foreach($skorAkhir as $index => $skor)
                            @if(isset($alternatif[$index]))
                                <tr>
                                    <td>{{ $skor == $highestScore ? 1 : ++$ranking }}</td>
                                    <td>{{ $alternatif[$index]->nama_alternatif }}</td>
                                    <td>{{ number_format($skor, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Tidak ada data skor atau data alternatif.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
