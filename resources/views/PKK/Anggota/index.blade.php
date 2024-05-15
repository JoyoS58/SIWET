
@extends('layouts.templatePKK')
@section('title', 'Pengelolaan Data Anggota PKK')

@section('content_header')
    <h1>Pengelolaan Data Anggota PKK</h1>
@endsection
@section('content')
<head>
<H1>Pengelolaan Data Anggota PKK</H1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Data Anggota PKK</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('AnggotaPKK/create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($AnggotaPKK as $index => $anggota)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->jabatan }}</td>
                                    <td>{{ $anggota->nomor_Telepon }}</td>
                                    <td class="action-buttons">
                                        <a href="{{url('AnggotaPKK/show/' . $anggota->ID_Anggota)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{url('AnggotaPKK/edit/' . $anggota->ID_Anggota)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{$anggota->ID_Anggota}}" action="{{ url('AnggotaPKK/delete/' . $anggota->ID_Anggota) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$anggota->ID_Anggota}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
@endsection
