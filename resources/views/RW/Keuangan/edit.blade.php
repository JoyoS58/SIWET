@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Catatan Keuangan Warga</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('KeuanganRW/' . $KeuanganRW->ID_Transaksi) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jenis Transaksi</label>
                <div class="col-10">
                    <select class="form-control" id="jenis_Transaksi" name="jenis_Transaksi" required>
                        <option value="">Pilih Jenis Transaksi</option>
                        <option value="Pemasukan" @if(old('jenis_Transaksi', $KeuanganRW->jenis_Transaksi) == 'Pemasukan') selected @endif>Pemasukan</option>
                        <option value="Pengeluaran" @if(old('jenis_Transaksi', $KeuanganRW->jenis_Transaksi) == 'Pengeluaran') selected @endif>Pengeluaran</option>
                    </select>
                    @error('jenis_Transaksi')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nominal</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal', $KeuanganRW->nominal) }}" required>
                    @error('nominal')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Transaksi</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tanggal_Transaksi" name="tanggal_Transaksi" value="{{ old('tanggal_Transaksi', $KeuanganRW->tanggal_Transaksi) }}" required>
                    @error('tanggal_Transaksi')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Keterangan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $KeuanganRW->deskripsi) }}" required>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{ url('KeuanganRW') }}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
