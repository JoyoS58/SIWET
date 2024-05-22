@extends('layouts.templatePKK')
@section('title', 'Sistem Pendukung Keputusan')

@section('content_header')
    <h1>Sistem Pendukung Keputusan</h1>
@endsection

@section('content')
<head>
    <h1>Peminjaman Dana Pra-Koperasi</h1>
</head>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title">Sistem Pendukung Keputusan</h3>
                    
                </div>
            </div>
            <div class="card-body row">
                <!-- Search and Filter Form -->
                {{-- <form method="GET" action="{{ url('AnggotaPKK') }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search by name..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="filter_jabatan" class="form-control">
                                <option value="">Select Jabatan</option>
                                @foreach($jabatanOptions as $jabatan)
                                    <option value="{{ $jabatan }}" {{ request('filter_jabatan') == $jabatan ? 'selected' : '' }}>
                                        {{ $jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <div class="col text-right">
                    <a type="button" class="btn btn-info add-transaction-button" href="{{url('AnggotaPKK/create')}}">Tambah</a>
                </div> --}}

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th>Jenis Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($AnggotaPKK as $index => $anggota)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->jabatan }}</td>
                                <td>{{ $anggota->nomor_Telepon }}</td> --}}
                                {{-- <td class="action-buttons">
                                    <a href="{{url('AnggotaPKK/show/' . $anggota->ID_Anggota)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="{{url('AnggotaPKK/edit/' . $anggota->ID_Anggota)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <form id="deleteForm{{$anggota->ID_Anggota}}" action="{{ url('AnggotaPKK/delete/' . $anggota->ID_Anggota) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$anggota->ID_Anggota}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr> --}}
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>     
@endsection
