@extends('layouts.templatePKK')

@section('title', 'Sistem Pendukung Keputusan')

@section('content_header')
    <h1>Sistem Pendukung Keputusan</h1>
    <title>SIWET</title>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <a href="#tambahKriteria" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
        </a>
        <div class="collapse show" id="tambahKriteria">
            <div class="card-body">
                <!-- Success Message -->
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('msg') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" name="nama_kriteria" value="{{ old('nama_kriteria') }}">
                        @error('nama_kriteria')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="atribut">Atribut</label>
                        <select name="atribut" id="atribut" class="form-control" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                        @error('atribut')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="text" class="form-control @error('bobot') is-invalid @enderror" name="bobot" value="{{ old('bobot') }}">
                        @error('bobot')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Atribut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($kriteria as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama_Kriteria }}</td>
                                    <td>{{ $row->atribut }}</td>
                                    <td>
                                        <a href="{{ route('kriteria.edit', $row->ID_Kriteria) }}" class="btn btn-sm btn-circle btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kriteria.destroy', $row->ID_Kriteria) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-circle btn-danger hapus"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($kriteria->isEmpty())
                        <div class="alert alert-warning">No kriteria found.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
