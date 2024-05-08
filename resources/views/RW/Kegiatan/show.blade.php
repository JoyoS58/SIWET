@extends('layouts.template')

@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            @empty($kegiatanRW) 
                <div class="alert alert-danger alert-dismissible"> 
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                    Data yang Anda cari tidak ditemukan. 
                </div> 
            @else 
                <table class="table table-bordered table-striped table-hover table-sm"> 
                    {{-- <tr> 
                        <th>ID Transaksi</th> 
                        <td>{{ $keuanganRW->ID_Transaksi }}</td> 
                    </tr>  --}}
                    <tr> 
                        <th>Nama Kegiatan</th>
                        <td>{{ $kegiatanRW->nama_Kegiatan }}</td> 
                    </tr> 
                    <tr> 
                        <th>Tanggal Kegiatan</th>
                        <td>{{ $kegiatanRW->tanggal }}</td> 
                    </tr>  
                    <tr> 
                        <th>Penanggung Jawab</th>
                        <td>{{ $kegiatanRW->penanggung_Jawab }}</td> 
                    </tr>  
                    <tr> 
                        <th>Tempat Kegiatan</th> 
                        <td>{{ $kegiatanRW->tempat }}</td> 
                    </tr>   
                    <tr> 
                        <th>Keterangan</th> 
                        <td>{{ $kegiatanRW->dekripsi }}</td> 
                    </tr>   
                </table> 
            @endempty 
            <a href="{{ url('kegiatanRW') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        </div> 
    </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js') 
@endpush

{{-- @section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Kegiatan</h3>
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
                        <th>ID Pengurus</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>ID Kegiatan</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>Kerja Bakti</td>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab</th>
                        <td>Iwan</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kegiatan</th>
                        <td>18-04-2024</td>
                    </tr>
                    <tr>
                        <th>Waktu Kegiatan</th>
                        <td>08:00 - 10:00</td>
                    </tr>
                    <tr>
                        <th>Tempat Kegiatan</th>
                        <td>Lapangan Rampal</td>
                    </tr>
                    <tr>
                        <th>Deskripsi Kegiatan</th>
                        <td>Melakukan pembersihan dan pembuatan gazebo di sekitar lapanagan Rampal</td>
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

@endpush --}}
