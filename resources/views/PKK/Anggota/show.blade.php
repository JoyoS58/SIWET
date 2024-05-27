
@extends('layouts.templatePKK')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Anggota PKK</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID Anggota</th>
                    <td>{{ $Anggota->ID_Anggota }}</td>
                </tr>
                <tr>
                    <th>ID Pengurus</th>
                    <td>{{ $Anggota->ID_Pengurus }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $Anggota->nama }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $Anggota->jabatan }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $Anggota->nomor_Telepon }}</td>
                </tr>
            </table>
            <a href="{{ url('AnggotaPKK') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection
