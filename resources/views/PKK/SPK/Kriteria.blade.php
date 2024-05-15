@extends('layouts.templatePKK')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Data Kriteria</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{ url('kriteria') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kode Kriteria</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ old('kode_kriteria') }}" required>
                        @error('kode_kriteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Kriteria</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') }}" required>
                        @error('nama_kriteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Bobot Kriteria Awal</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="{{ old('bobot_kriteria') }}" required min="0" step="0.01">
                        @error('bobot_kriteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Jenis Kriteria</label>
                    <div class="col-10">
                        <select name="jenis_kriteria" id="jenis_kriteria" class="form-control" required>
                            <option value="">- Pilih Jenis Kriteria -</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                        @error('jenis_kriteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{ url('kriteria') }}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
<!-- Custom CSS here -->
@endpush

@push('js')
<!-- Custom JS here -->
@endpush
