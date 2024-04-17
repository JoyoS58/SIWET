@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Transaksi</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            {{-- @empty($transaction)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else --}}
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Anggota</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>ID Pengurus</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>Iwan</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>Ketua Divisi Kerajinan</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>081xxx</td>
                    </tr>
                </table>
            {{-- @endempty --}}
            <a href="{{url('user')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush
