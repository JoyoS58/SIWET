@extends('layouts.templatePKK')

@section('title', 'Sistem Pendukung Keputusan')

@section('content_header')
    <h1>Sistem Pendukung Keputusan</h1>
@endsection

@section('content')
<div class="row">
    <!-- Kriteria -->
    <div class="col-md-8">
        <!-- ... kode untuk kriteria ... -->
    </div>
    
    <!-- Alternatif -->
    <div class="col-md-8">
        <a href="#tambahAlternatif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Alternatif</h6>
        </a>
        <div class="collapse show" id="tambahAlternatif">
            <div class="card-body">
                <!-- Success Message -->
                @if(Session::has('msg_alternatif'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('msg_alternatif') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if(Session::has('error_alternatif'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ Session::get('error_alternatif') }}
                    </div>
                @endif
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif</label>
                        <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" name="nama_alternatif" value="{{ old('nama_alternatif') }}">
                        @error('nama_alternatif')
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
                                <th>Nama Alternatif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($alternatif as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama_alternatif }}</td>
                                    <td>
                                        <a href="{{ route('alternatif.edit', $row->ID_alternatif) }}" class="btn btn-sm btn-circle btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('alternatif.destroy', $row->ID_alternatif) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-circle btn-danger hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($alternatif->isEmpty())
                        <div class="alert alert-warning">No alternatif found.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection