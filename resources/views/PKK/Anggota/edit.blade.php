@extends('layouts.templatePKK')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Anggota PKK</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('AnggotaPKK/' . $AnggotaPKK->ID_Anggota) }}" method="POST" class="form-horizontal">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $AnggotaPKK->nama) }}" required>
                    @error('nama')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jabatan</label>
                <div class="col-10">
                    <select class="form-control" id="jabatan" name="jabatan" required>
                        <option value="">Pilih Jabatan</option>
                        <option value="Ketua" @if(old('jabatan', $AnggotaPKK->jabatan) == 'Ketua') selected @endif>Ketua</option>
                        <option value="Anggota" @if(old('jabatan', $AnggotaPKK->jabatan) == 'Anggota') selected @endif>Anggota</option>
                    </select>
                    @error('jabatan')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nomor Telepon</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="nomor_Telepon" name="nomor_Telepon" value="{{ old('nomor_Telepon', $AnggotaPKK->nomor_Telepon) }}" required>
                    @error('nomor_Telepon')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{ url('AnggotaPKK') }}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
