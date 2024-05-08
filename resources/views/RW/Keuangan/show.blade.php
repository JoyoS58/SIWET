@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Catatan Keuangan</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>Jenis Transaksi</th>
                        <td>{{$keuanganRW->jenis_Transaksi}}</td>
                    </tr>
                    <tr>
                        <th>Nominal</th>
                        <td>{{$keuanganRW->nominal}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td>{{$keuanganRW->tanggal_Transaksi}}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{$keuanganRW->deskripsi}}</td>
                    </tr>
                </table>
            <a href="{{url('keuanganRW')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush