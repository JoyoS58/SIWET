@extends('layouts.templatePKK')
@section('title', 'Kegiatan PKK')

@section('content_header')
<h1>Pengelolaan Kegiatan PKK</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Kegiatan PKK</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('kegiatanPKK/create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Penanggung Jawab</th>
                                <th>Tempat Kegiatan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($dataKegiatan as $index => $kegiatanPKK)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{ $kegiatanPKK->nama_Kegiatan }}</td>
                                    <td>{{ $kegiatanPKK->waktu }}</td>
                                    <td>{{ $kegiatanPKK->tanggal }}</td>
                                    <td>{{ $kegiatanPKK->penanggung_Jawab }}</td>
                                    <td>{{ $kegiatanPKK->tempat }}</td>
                                    <td>{{ $kegiatanPKK->deskripsi }}</td>
                                    <td class="action-buttons">
                                        <a href="{{url('kegiatanPKK/show/' . $kegiatanPKK->ID_Kegiatan)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{url('kegiatanPKK/edit/' . $kegiatanPKK->ID_Kegiatan)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{$kegiatanPKK->ID_Kegiatan}}" action="{{ url('kegiatanPKK/delete/' . $kegiatanPKK->ID_Kegiatan) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$kegiatanPKK->ID_Kegiatan}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>     
@endsection

{{-- @extends('layouts.templatePKK')
@section('title', 'Kegiatan PKK')

@section('content_header')
<h1>Pengelolaan Kegiatan PKK</h1>
@endsection
@section('content')
<head>
<H3>Pengelolaan Kegiatan PKK</H3>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Pengelolaan Kegiatan PKK</h3>
                    <a href="{{ url('/kegiatanPKK/create') }}" class="btn btn-primary btn-sm ml-auto">Add Kegiatan</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Penanggung Jawab</th>
                                <th>Tempat Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kerja Bakti</td>
                                <td>4 April 2024</td>
                                <td>Syahrul Faroh</td>
                                <td>Lapangan Tengah</td>
                                <td class="action-buttons">
                                    <a href="{{ url('/kegiatanPKK/edit') }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteConfirmationModal"></i> Delete</a>
                                    <a href="{{ url('/kegiatanPKK/show') }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rapat Tahunan</td>
                                <td>6 April 2024</td>
                                <td>Ikhwandi</td>
                                <td>Balai Desa</td>
                                <td class="action-buttons">
                                    <a href="{{ url('/kegiatanPKK/edit') }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteConfirmationModal"></i> Delete</a>
                                    <a href="{{ url('/kegiatanPKK/show') }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Senam Bersama</td>
                                <td>7 April 2024</td>
                                <td>Riski Abdi</td>
                                <td>Lapangan Tengah</td>
                                <td class="action-buttons">
                                    <a href="{{ url('/kegiatanPKK/edit') }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteConfirmationModal"></i> Delete</a>
                                    <a href="{{ url('/kegiatanPKK/show') }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerja Bakti</td>
                                <td>6 April 2024</td>
                                <td>Joyo Sugito</td>
                                <td>Lapangan Tengah</td>
                                <td class="action-buttons">
                                    <a href="{{ url('/kegiatanPKK/edit') }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteConfirmationModal"></i> Delete</a>
                                    <a href="{{ url('/kegiatanPKK/show') }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus transaksi ini?</p>
                    <p id="transactionDetails"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection --}}