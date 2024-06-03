@extends('layouts.templatePKK')

@section('content')
    <div class="container">
        <h1>Data Kriteria</h1>
        <a href="{{ route('dataKriteria.create') }}" class="btn btn-primary">Tambah Data Kriteria</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama Kriteria</th>
                    <th>Nama Data Kriteria</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKriteria as $data)
                    <tr>
                        <td>{{ $data->kriteria->nama_Kriteria }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nilai }}</td>
                        <td>
                            <a href="{{ route('dataKriteria.edit', $data->ID_DataKriteria) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dataKriteria.destroy', $data->ID_DataKriteria) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
