@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Kegiatan</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>{{$KegiatanRW->nama_Kegiatan}}</td>
                    </tr>
                    <tr>
                        <th>Waktu Kegiatan</th>
                        <td>{{$KegiatanRW->waktu}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kegiatan </th>
                        <td>{{$KegiatanRW->tanggal}}</td>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab</th>
                        <td>{{$KegiatanRW->penanggung_Jawab}}</td>
                    </tr>
                    <tr>
                        <th>Tempat Kegiatan</th>
                        <td>{{$KegiatanRW->tempat}}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{$KegiatanRW->deskripsi}}</td>
                    </tr>
                </table>
            <a href="{{url('KegiatanRW')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush