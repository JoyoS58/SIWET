@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data RT</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <form action="{{url('RT')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Ketua RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="ketua_rt" name="ketua_rt" placeholder="Masukkan Nama Ketua RT" required>
                        @error('ketua_rt')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Sekretaris RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="sekretaris_rt" name="sekretaris_rt" placeholder="Masukkan Nama Sekretaris RT" required>
                        @error('sekretaris_rt')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Bendahara RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="bendahara_rt" name="bendahara_rt" placeholder="Masukkan Nama Bendahara RT" required>
                        @error('bendahara_rt')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nomor RT</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="nomor_rt" name="nomor_rt" placeholder="Masukkan Nomor RT" required>
                        @error('nomor_rt')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('/RT')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
