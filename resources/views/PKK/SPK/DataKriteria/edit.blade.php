@extends('layouts.templatePKK')

@section('content')
    <div class="container">
        <h1>Edit Data Kriteria</h1>
        <form action="{{ route('dataKriteria.update', $dataKriteria->ID_DataKriteria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ID_Kriteria">Kriteria</label>
                <select name="ID_Kriteria" id="ID_Kriteria" class="form-control" required>
                    @foreach($kriteria as $item)
                        <option value="{{ $item->ID_Kriteria }}" {{ $item->ID_Kriteria == $dataKriteria->ID_Kriteria ? 'selected' : '' }}>
                            {{ $item->nama_Kriteria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $dataKriteria->kategori }}" required>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" id="nilai" class="form-control" value="{{ $dataKriteria->nilai }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
