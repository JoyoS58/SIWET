@extends('layouts.templatePKK')

@section('content')
<div class="container">
    <h1>Data Kriteria</h1>
    @if(Session::has('msg'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('msg') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ Session::get('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Kategori</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKriteria as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->kriteria->nama_Kriteria }}</td>
                        <td>{{ $data->kategori }}</td>
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
        @if ($dataKriteria->isEmpty())
            <div class="alert alert-warning">No data found.</div>
        @endif
    </div>
</div>
@endsection
