@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Warga</h3>
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
                        <th>NIK</th>
                        <td>0888786857537</td>
                    </tr>
                    <tr>
                        <th>No KK</th>
                        <td>099989796663</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>Iwan</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>jln senggani</td>
                    </tr>
                    <tr>
                        <th>Jenis Penduduk</th>
                        <td>penduduk tetap</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>08-12-2003</td>
                    </tr>
                    <tr>
                        <th>jenis Kelamin</th>
                        <td>laki-laki</td>
                    </tr>
                </table>
            {{-- @endempty --}}
            <a href="{{url('warga')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush
