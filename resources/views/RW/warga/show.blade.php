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
                        <td>{{$Warga->NIK}}</td>
                    </tr>
                    <tr>
                        <th>ID_RT</th>
                        <td>{{$Warga->ID_RT}}</td>
                    </tr>
                    <tr>
                        <th>No KK</th>
                        <td>{{$Warga->nomor_KK}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$Warga->nama}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$Warga->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{$Warga->pekerjaan}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{$Warga->agama}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Penduduk</th>
                        <td>{{$Warga->jenis_Penduduk}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{$Warga->tempat_Tanggal_Lahir}}</td>
                    </tr>
                    <tr>
                        <th>jenis Kelamin</th>
                        <td>{{$Warga->jenis_Kelamin}}</td>
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
