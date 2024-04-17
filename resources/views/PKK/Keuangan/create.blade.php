@extends('layouts.templatePKK')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Keuangan PKK</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('level')}}" method="POST" class="form-horizontal">
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
                        <a href="{{url('level')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')

@endpush
@push('js')

@endpush