@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Penghuni Kos</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if(empty($Mahasiswa))
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>NIK</th>
                        <td>{{ $Mahasiswa->NIK }}</td>
                    </tr>
                    <tr>
                        <th>ID_RT</th>
                        <td>{{ $Mahasiswa->ID_RT }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $Mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{ $Mahasiswa->tempat_Tanggal_Lahir }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Kos</th>
                        <td>{{ $Mahasiswa->alamat_Kos }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $Mahasiswa->jenis_Kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $Mahasiswa->agama }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $Mahasiswa->status }}</td>
                    </tr>
                    @if($Mahasiswa->status == 'Mahasiswa')
                        <tr>
                            <th>Universitas</th>
                            <td>{{ $Mahasiswa->universitas }}</td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td>{{ $Mahasiswa->jurusan }}</td>
                        </tr>
                        <tr>
                            <th>Wali</th>
                            <td>{{ $Mahasiswa->wali }}</td>
                        </tr>
                    @elseif($Mahasiswa->status == 'Pekerja')
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $Mahasiswa->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Kerja</th>
                            <td>{{ $Mahasiswa->alamatKerja }}</td>
                        </tr>
                    @endif
                </table>
            @endif
            <a href="{{ url('MahasiswaKos') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush