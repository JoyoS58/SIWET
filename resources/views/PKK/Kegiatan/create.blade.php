@extends('layouts.templatePKK')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Kegiatan PKK</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('KegiatanPKK')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_Kegiatan" name="nama_Kegiatan" placeholder="Masukkan Nama Kegiatan" required>
                    @error('nama_Kegiatan')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Waktu Kegiatan</label>
                <div class="col-10">
                    <input type="time" class="form-control" id="waktu" name="waktu" placeholder="Masukkan Waktu Kegiatan" required>
                    @error('waktu')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Kegiatan</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Kegiatan" required>
                    @error('tanggal')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Penanggung Jawab</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="penanggung_Jawab" name="penanggung_Jawab" placeholder="Masukkan Penanggung Jawab" required>
                    @error('penanggung_Jawab')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tempat Kegiatan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Tempat Kegiatan" required>
                    @error('tempat')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Keterangan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Keterangan" required>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{url('KegiatanPKK')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


{{-- @extends('layouts.templatePKK')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Kegiatan PKK</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('KegiatanPKK')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama KegiatanS</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="nominal" name="nominal" value="{{old('nominal')}}" required>
                        @error('nominal')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Kegiatan</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal')}}" required>
                        @error('tanggal')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Penanggung Jawab</label>
                    <div class="col-11">
                        <select name="penanggung_jawab" id="jenis_transaksi" class="form-control" required>
                            <option value="">- Penanggung Jawab -</option>
                            <option value="ikhwandi">Ikhwandi</option>
                            <option value="joyo_sugito">Joyo Sugito</option>
                            <option value="syahrul_faroh">Syahrul Faroh</option>
                            <option value="riski_abdi">Riski Abdi</option>
                        </select>
                        @error('penanggung_jawab')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tempat Kegiatan</label>
                    <div class="col-11">
                        <textarea class="form-control" id="tempat" name="tempat" rows="3" required>{{old('keterangan')}}</textarea>
                        @error('tempat')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                



                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('KegiatanPKK')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')

@endpush
@push('js')

@endpush --}}