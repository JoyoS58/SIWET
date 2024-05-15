
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
                    <td>{{ $anggota->ID_Anggota }}</td>
                </tr>
                <tr>
                    <th>ID Pengurus</th>
                    <td>{{ $anggota->ID_Pengurus }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $anggota->nama }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $anggota->jabatan }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $anggota->nomor_Telepon }}</td>
                </tr>
            </table>
            <a href="{{ url('AnggotaPKK') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection
