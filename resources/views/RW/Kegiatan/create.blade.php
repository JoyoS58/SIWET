@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Kegiatan Warga</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('kegiatanRW')}}" method="POST" class="form-horizontal">
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
                    <a href="{{url('kegiatanRW')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

{{-- 
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Kegiatan RW</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('kegiatan-rw')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">ID Pengurus</label>
                    <div class="col-10">
                        <select name="id_pengurus" id="id_pengurus" class="form-control" required>
                            <option value="">- Pilih ID Pengurus -</option>
                            <option value="1">ID Pengurus 1</option>
                            <option value="2">ID Pengurus 2</option>
                            <!-- Tambahkan option lainnya sesuai dengan ID pengurus yang tersedia -->
                        </select>
                        @error('id_pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{old('nama_kegiatan')}}" required>
                        @error('nama_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Penanggung Jawab</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{old('penanggung_jawab')}}" required>
                        @error('penanggung_jawab')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Tempat Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" value="{{old('tempat_kegiatan')}}" required>
                        @error('tempat_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Tanggal Kegiatan</label>
                    <div class="col-10">
                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{old('tanggal_kegiatan')}}" required>
                        @error('tanggal_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Waktu Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="{{old('waktu_kegiatan')}}" required>
                        @error('waktu_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Deskripsi Kegiatan</label>
                    <div class="col-10">
                        <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" rows="3" required>{{old('deskripsi_kegiatan')}}</textarea>
                        @error('deskripsi_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('/kegiatanRW')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection --}}
