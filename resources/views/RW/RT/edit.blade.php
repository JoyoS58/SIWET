@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data RT</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('RT' . $RT->ID_RT)}}" method="POST" class="form-horizontal">
               @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Ketua RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="ketua_RT" name="ketua_RT" value="{{old('ketua_RT',$RT->ketua_RT)}}" required>
                        @error('ketua_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Sekretaris RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="sekretaris_RT" name="sekretaris_RT" value="{{old('sekretaris_RT',$RT->sekretaris_RT)}}" required>
                        @error('sekretaris_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Bendahara RT</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="bendahara_RT" name="bendahara_RT" value="{{old('bendahara_RT',$RT->bendahara_RT)}}" required>
                        @error('bendahara_RT')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nomor RT</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="nomor_RT" name="nomor_RT" value="{{old('nomor_RT',$RT->nomor_RT)}}" required>
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
