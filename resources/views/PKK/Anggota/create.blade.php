@extends('layouts.templatePKK')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Anggota PKK</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('AnggotaPKK')}}" method="POST" class="form-horizontal">
            @csrf
            {{-- <div class="form-group row">
                <label class="col-2 control-label col-form-label" for="ID_Pengurus">ID Pengurus</label>
                <div class="col-10">
                    <select class="form-control" id="ID_Pengurus" name="ID_Pengurus" required>
                        <option value="">Pilih ID Pengurus</option>
                        @foreach($PKK as $pkk)
                            <option value="{{ $pkk->ID_Pengurus }}"> ID Pengurus {{ $pkk->ID_Pengurus }}</option>
                        @endforeach
                    </select>
                    @error('ID_Pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> --}}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
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
                        <option value="Ketua">Ketua</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                    @error('jabatan')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nomor Telepon</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="nomor_Telepon" name="nomor_Telepon" placeholder="Masukkan Nomor Telepon" required>
                    @error('nomor_Telepon')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{url('AnggotaPKK')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
