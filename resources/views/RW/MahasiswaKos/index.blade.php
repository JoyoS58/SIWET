@extends('layouts.template')
@section('title', 'Pengelolaan Data Mahasiswa Kos')

@section('content_header')
    <h1>Pengelolaan Data Penghuni Kos</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title">Pengelolaan Data Penghuni Kos</h3>
                </div>
            </div>
            <div class="card-body row">
                <!-- Search and Filter Form -->
                <div class="col">
                    <form method="GET" action="{{ url('MahasiswaKos') }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="filter" class="form-control">
                                    <option value="">Select Alamat Kos</option>
                                    @foreach($alamatKos as $ak)
                                        <option value="{{ $ak->alamat_Kos }}" {{ request('filter') == $ak->alamat_Kos ? 'selected' : '' }}>
                                            {{ $ak->alamat_Kos }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col text-right">
                    <a type="button" class="btn btn-info add-transaction-button" href="{{url('MahasiswaKos/create')}}">Tambah</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th width="150px" class="text-center">Nama</th>
                            <th width="150px" class="text-center">Tempat, Tanggal Lahir</th>
                            <th width="200px" class="text-center">Alamat Kos</th>
                            <th width="150px" class="text-center">Jenis Kelamin</th>
                            <th width="100px" class="text-center">Agama</th>
                            <th width="150px" class="text-center">Status</th>
                            <th width="150px" class="text-center">Universitas / Pekerjaan</th>
                            <th width="150px" class="text-center">Jurusan / Alamat Kerja</th>
                            <th width="100px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($MahasiswaKos as $index => $Mahasiswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $Mahasiswa->nama }}</td>
                                <td>{{ $Mahasiswa->tempat_Tanggal_Lahir }}</td>
                                <td>{{ $Mahasiswa->alamat_Kos }}</td>
                                <td>{{ $Mahasiswa->jenis_Kelamin }}</td>
                                <td>{{ $Mahasiswa->agama }}</td>
                                <td>{{ $Mahasiswa->status }}</td>
                                @if ($Mahasiswa->status == 'Mahasiswa')
                                    <td>{{ $Mahasiswa->universitas }}</td>
                                    <td>{{ $Mahasiswa->jurusan }}</td>
                                @else
                                    <td>{{ $Mahasiswa->pekerjaan }}</td>
                                    <td>{{ $Mahasiswa->alamatKerja }}</td>
                                @endif
                                <td class="action-buttons">
                                    <a href="{{url('MahasiswaKos/show/' . $Mahasiswa->NIK)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="{{ url('MahasiswaKos/edit/' . $Mahasiswa->NIK) }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <form id="deleteForm{{$Mahasiswa->NIK}}" action="{{ url('MahasiswaKos/delete/' . $Mahasiswa->NIK) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) event.preventDefault(); document.getElementById('deleteForm{{$Mahasiswa->NIK}}').submit();" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
