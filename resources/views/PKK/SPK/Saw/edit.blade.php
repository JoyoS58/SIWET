@extends('layouts.templatePKK')

@section('title', 'Edit Kriteria')

@section('content_header')
    <h1>Edit Kriteria</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kriteria</h6>
            </div>
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
                <form action="{{ route('kriteria.update', $kriteria->ID_Kriteria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" name="nama_kriteria" value="{{ old('nama_kriteria', $kriteria->nama_Kriteria) }}">
                        @error('nama_kriteria')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="atribut">Atribut</label>
                        <select name="atribut" id="atribut" class="form-control" required>
                            <option value="Benefit" {{ $kriteria->atribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $kriteria->atribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                        @error('atribut')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="text" class="form-control @error('bobot') is-invalid @enderror" name="bobot" value="{{ old('bobot', $kriteria->bobot_Kriteria) }}">
                        @error('bobot')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-sm btn-primary">Update</button>
                    <a href="{{ route('kriteria.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
