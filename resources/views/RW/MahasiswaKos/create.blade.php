@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Mahasiswa Kos</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('warga/update')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">NIK</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nik" name="nik" value="{{old('nik')}}" required>
                    @error('nik')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}" required>
                    @error('nama')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">No Telepon</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{old('no_telp')}}" required>
                    @error('no_telp')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Lahir</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}" required>
                    @error('tgl_lahir')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jenis Kelamin</label>
                <div class="col-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                        <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Agama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="agama" name="agama" value="{{old('agama')}}" required>
                    @error('agama')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jurusan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{old('jurusan')}}" required>
                    @error('jurusan')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Universitas</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="universitas" name="universitas" value="{{old('universitas')}}" required>
                    @error('universitas')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{url('mahasiswaKos')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
