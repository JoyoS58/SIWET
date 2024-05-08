@extends('layouts.template')

@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            @empty($keuanganRW) 
                <div class="alert alert-danger alert-dismissible"> 
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                    Data yang Anda cari tidak ditemukan. 
                </div> 
            @else 
                <table class="table table-bordered table-striped table-hover table-sm"> 
                    <tr> 
                        <th>ID Transaksi</th> 
                        <td>{{ $keuanganRW->ID_Transaksi }}</td> 
                    </tr> 
                    <tr> 
                        <th>Jenis Transaksi</th>
                        <td>{{ $keuanganRW->jenis_Transaksi }}</td> 
                    </tr> 
                    <tr> 
                        <th>Nominal</th>
                        <td>{{ $keuanganRW->nominal }}</td> 
                    </tr>  
                    <tr> 
                        <th>Tanggal Transaksi</th>
                        <td>{{ $keuanganRW->tanggal_Transaksi }}</td> 
                    </tr>  
                    <tr> 
                        <th>Keterangan</th> 
                        <td>{{ $keuanganRW->deskripsi }}</td> 
                    </tr>   
                </table> 
            @endempty 
            <a href="{{ url('keuanganRW') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        </div> 
    </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js') 
@endpush

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
                        <th>ID Pengurus</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>Jenis Transaksi</th>
                        <td>Pemasukan</td>
                    </tr>
                    <tr>
                        <th>Nominal</th>
                        <td>Rp. 1.000.000</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>Iuran Warga</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>14-04-2024</td>
                    </tr>
                </table>
            {{-- @endempty --}}
            <a href="{{url('/keuanganRW')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush
