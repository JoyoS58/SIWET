@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data RT</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="aleRT aleRT-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="aleRT aleRT-danger">{{session('error')}}</div>
            @endif
            <form action="{{url('RT')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Ketua RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="ketua_RT" name="ketua_RT" placeholder="Masukkan Nama Ketua RT" required>
                        @error('ketua_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Sekretaris RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="sekretaris_RT" name="sekretaris_RT" placeholder="Masukkan Nama Sekretaris RT" required>
                        @error('sekretaris_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Bendahara RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="bendahara_RT" name="bendahara_RT" placeholder="Masukkan Nama Bendahara RT" required>
                        @error('bendahara_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nomor RT</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="nomor_RT" name="nomor_RT" placeholder="Masukkan Nomor RT" required>
                        @error('nomor_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('RT')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
