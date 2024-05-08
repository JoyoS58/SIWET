@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Mahasiswa Kos</h3>
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
                        <td>{{$mahasiswa->NIK}}</td>
                    </tr>
                    <tr>
                        <th>ID_RT</th>
                        <td>{{$mahasiswa->ID_RT}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$mahasiswa->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{$mahasiswa->tempat_Tanggal_Lahir}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Kos</th>
                        <td>{{$mahasiswa->alamat_Kos}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{$mahasiswa->jenis_Kelamin}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{$mahasiswa->agama}}</td>
                    </tr>
                    <tr>
                        <th>Universitas</th>
                        <td>{{$mahasiswa->universitas}}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{$mahasiswa->jurusan}}</td>
                    </tr>
                </table>
            {{-- @endempty --}}
            <a href="{{url('mahasiswaKos')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush
