@extends('layouts.templatePKK')
@section('title', 'Pengelolaan Anggota PKK')

@section('content_header')
    <h1>Pengelolaan Anggota PKK</h1>
@endsection
@section('content')
<head>
<H3>PENGELOLAAN Anggota PKK</H3>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Pengelolaan Anggota PKK</h3>
                    <a href="{{ url('/anggotaPKK/create') }}" class="btn btn-primary btn-sm ml-auto">Add Anggota</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Iwan</td>
                                <td>Ketua Divisi Kerajinan</td>
                                <td>082xxx</td>
                                <td class="action-buttons">
                                    <a href="{{url('/anggotaPKK/edit')}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('/anggotaPKK/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>Sugit</td>
                                <td>Anggota Divisi Kerajinan</td>
                                <td>081xxx</td>
                                <td class="action-buttons">
                                    <a href="{{url('/anggotaPKK/editt')}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('/anggotaPKK/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>Elsa</td>
                                <td>Anggota Divisi Kerajinan</td>
                                <td>083xxx</td>
                                <td class="action-buttons">
                                    <a href="{{url('/anggotaPKK/edit')}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('/anggotaPKK/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>Nanda</td>
                                <td>Anggota Divisi Kerajinan</td>
                                <td>084xxx</td>
                                <td class="action-buttons">
                                    <a href="{{url('/anggotaPKK/edit')}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('/anggotaPKK/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>Syahrul</td>
                                <td>Anggota Divisi Kerajinan</td>
                                <td>085xxx</td>
                                <td class="action-buttons">
                                    <a href="{{url('/anggotaPKK/edit')}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('/anggotaPKK/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection