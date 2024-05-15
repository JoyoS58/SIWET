@extends('layouts.templatePKK')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Kegiatan PKK</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('kegiatanPKK/' . $kegiatanPKK->ID_Kegiatan)}}" method="POST" class="form-horizontal">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_Kegiatan" name="nama_Kegiatan" value="{{old('nama_Kegiatan',$kegiatanPKK->nama_Kegiatan)}}" required>
                    @error('nama_Kegiatan')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Waktu Kegiatan</label>
                <div class="col-10">
                    <input type="time" class="form-control" id="waktu" name="waktu" value="{{old('waktu',$kegiatanPKK->waktu)}}" required>
                    @error('waktu')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Kegiatan</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal',$kegiatanPKK->tanggal)}}" required>
                    @error('tanggal')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Penanggung Jawab</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="penanggung_Jawab" name="penanggung_Jawab" value="{{old('penanggung_Jawab',$kegiatanPKK->penanggung_Jawab)}}" required>
                    @error('penanggung_Jawab')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tempat Kegiatan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{old('tempat',$kegiatanPKK->tempat)}}" required>
                    @error('tempat')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Keterangan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{old('deskripsi',$kegiatanPKK->deskripsi)}}" required>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{url('kegiatanPKK')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
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
            <form action="{{url('kegiatanPKK')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Penanggung Jawab</label>
                    <div class="col-11">
                        <select name="id_pengurus" id="id_pengurus" class="form-control" required>
                            <option value="">- Penanggung Jawab -</option>
                            <option value="ikhwandi">Ikhwandi</option>
                            <option value="joyo_sugito">Joyo Sugito</option>
                            <option value="syahrul_faroh">Syahrul Faroh</option>
                            <option value="riski_abdi">Riski Abdi</option>
                            <!-- tambahkan option lainnya sesuai dengan ID pengurus yang tersedia -->
                        </select>
                        @error('id_pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Kegiatan</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="nominal" name="nominal" value="{{old('kegiatan')}}" required>
                        @error('nominal')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal  Kegiatan </label>
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
                        <select name="id_pengurus" id="id_pengurus" class="form-control" required>
                            <option value="">- Penanggung Jawab -</option>
                            <option value="ikhwandi">Ikhwandi</option>
                            <option value="joyo_sugito">Joyo Sugito</option>
                            <option value="syahrul_faroh">Syahrul Faroh</option>
                            <option value="riski_abdi">Riski Abdi</option>
                            <!-- tambahkan option lainnya sesuai dengan ID pengurus yang tersedia -->
                        </select>
                        @error('id_pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tempat Kegiatan</label>
                    <div class="col-11">
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{old('keterangan')}}</textarea>
                        @error('keterangan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                



                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('kegiatanPKK')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
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