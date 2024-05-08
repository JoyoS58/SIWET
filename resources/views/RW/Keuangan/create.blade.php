@extends('layouts.template') 
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Catatan Keuangan Warga</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('keuanganRW')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jenis Transaksi</label>
                <div class="col-10">
                    <select class="form-control" id="jenis_Transaksi" name="jenis_Transaksi" required>
                        <option value="">Pilih Jenis Transaksi</option>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                    @error('jenis_Transaksi')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nominal</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal" required>
                    @error('nominal')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Transaksi</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tanggal_Transaksi" name="tanggal_Transaksi" placeholder="Masukkan Tanggal Transaksi" required>
                    @error('tanggal_Transaksi')
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
                    <a href="{{url('keuanganRW')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


{{-- @extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Keuangan RW</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('keuanganRW')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID Pengurus</label>
                    <div class="col-11">
                        <select name="id_pengurus" id="id_pengurus" class="form-control" required>
                            <option value="">- Pilih ID Pengurus -</option>
                            <option value="1">ID Pengurus 1</option>
                            <option value="2">ID Pengurus 2</option>
                            <!-- tambahkan option lainnya sesuai dengan ID pengurus yang tersedia -->
                        </select>
                        @error('id_pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Transaksi</label>
                    <div class="col-11">
                        <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                            <option value="">- Pilih Jenis Transaksi -</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                        @error('jenis_transaksi')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nominal</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="nominal" name="nominal" value="{{old('nominal')}}" required>
                        @error('nominal')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Keterangan</label>
                    <div class="col-11">
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{old('keterangan')}}</textarea>
                        @error('keterangan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal')}}" required>
                        @error('tanggal')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('keuanganRW')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
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