@extends('layouts.templatePKK')
@section('title', 'Pengelolaan Kas PKK')

@section('content_header')
<h1>Pengelolaan Keuangan PKK</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Keuangan PKK</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('keuanganPKK/create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Jenis Transaksi</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataKeuangan as $keuanganPKK)
                                <tr>
                                    <td>{{ $keuanganPKK->ID_Transaksi }}</td>
                                    <td>{{ $keuanganPKK->jenis_Transaksi }}</td>
                                    <td>{{ $keuanganPKK->nominal }}</td>
                                    <td>{{ $keuanganPKK->tanggal }}</td>
                                    <td>{{ $keuanganPKK->deskripsi }}</td>
                                    <td class="action-buttons">
                                        <a href="{{url('keuanganPKK/show/' . $keuanganPKK->ID_Transaksi)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{ url('keuanganPKK/edit/' . $keuanganPKK->ID_Transaksi) }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{$keuanganPKK->ID_Transaksi}}" action="{{ url('keuanganPKK/delete/' . $keuanganPKK->ID_Transaksi) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$keuanganPKK->ID_Transaksi}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
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