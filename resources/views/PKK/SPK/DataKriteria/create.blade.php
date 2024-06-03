@extends('layouts.templatePKK')

@section('content')
    <div class="container">
        <h1>Tambah Data Kriteria</h1>
        <form action="{{ route('dataKriteria.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ID_Kriteria">Kriteria</label>
                <select name="ID_Kriteria" id="ID_Kriteria" class="form-control" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach($kriteria as $item)
                        <option value="{{ $item->ID_Kriteria }}">{{ $item->nama_Kriteria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama Data Kriteria</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" id="nilai" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
