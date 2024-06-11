@extends('layouts.templatePKK')
@section('title', 'Input Nilai')

@section('content_header')
    <h1>Input Nilai Alternatif</h1>
@endsection

@section('content')
<div class="container mt-5">
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
@endsection
