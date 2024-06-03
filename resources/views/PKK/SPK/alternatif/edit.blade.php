@extends('layouts.templatePKK')

@section('title', 'Edit Alternatif')

@section('content_header')
    <h1>Edit Alternatif</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <!-- Error Message -->
                @if(Session::has('error_alternatif'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ Session::get('error_alternatif') }}
                    </div>
                @endif
                <form action="{{ route('alternatif.update', $alternatif->ID_alternatif) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif</label>
                        <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" name="nama_alternatif" value="{{ old('nama_alternatif', $alternatif->nama_alternatif) }}">
                        @error('nama_alternatif')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-sm btn-primary">Update</button>
                    <a href="{{ route('alternatif.index') }}" class="btn btn-sm btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection