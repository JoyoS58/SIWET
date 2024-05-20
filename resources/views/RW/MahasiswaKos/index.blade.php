@extends('layouts.template')
@section('title', 'Pengelolaan Data Mahasiswa Kos')

@section('content_header')
    <h1>Pengelolaan Data Mahasiswa Kos</h1>
@endsection
@section('content')
<head>
    <h1>Pengelolaan Data Mahasiswa Kos</h1>
</head>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title">Pengelolaan Data Mahasiswa Kos</h3>
                    <div class="col-md-12 text-right">
                        <a type="button" class="btn btn-info add-transaction-button" href="{{url('MahasiswaKos/create')}}">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Search and Filter Form -->
                <form method="GET" action="{{ url('MahasiswaKos') }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="filter" class="form-control">
                                <option value="">Select Universitas</option>
                                @foreach($universitas as $u)
                                    <option value="{{ $u->universitas }}" {{ request('filter') == $u->universitas ? 'selected' : '' }}>
                                        {{ $u->universitas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat Kos</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Universitas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswaKos as $index => $mahasiswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->tempat_Tanggal_Lahir }}</td>
                                <td>{{ $mahasiswa->alamat_Kos }}</td>
                                <td>{{ $mahasiswa->jenis_Kelamin }}</td>
                                <td>{{ $mahasiswa->agama }}</td>
                                <td>{{ $mahasiswa->universitas }}</td>
                                <td>{{ $mahasiswa->jurusan }}</td>
                                <td class="action-buttons">
                                    <a href="{{url('MahasiswaKos/show/' . $mahasiswa->NIK)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="{{url('MahasiswaKos/edit/' . $mahasiswa->NIK)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <form id="deleteForm{{$mahasiswa->NIK}}" action="{{ url('MahasiswaKos/delete/' . $mahasiswa->NIK) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$mahasiswa->NIK}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
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
