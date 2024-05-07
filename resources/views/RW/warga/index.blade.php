@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan Data Warga</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Data Warga</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('Warga/create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Jenis Kelamin</th>
                                <th>Jenis Penduduk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataWarga as $warga)
                                <tr>
                                    <td>{{ $warga->nama }}</td>
                                    <td>{{ $warga->tempat_Tanggal_Lahir }}</td>
                                    <td>{{ $warga->agama }}</td>
                                    <td>{{ $warga->alamat }}</td>
                                    <td>{{ $warga->pekerjaan }}</td>
                                    <td>{{ $warga->jenis_Kelamin }}</td>
                                    <td>{{ $warga->jenis_Penduduk }}</td>
                                    <td class="action-buttons">
                                        <a href="{{url('Warga/show/' . $warga->NIK)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{url('Warga/edit/' . $warga->NIK)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{$warga->NIK}}" action="{{ url('Warga/delete/' . $warga->NIK) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$warga->NIK}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
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
