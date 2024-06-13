@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan Data Warga</h1>
@endsection
@section('content')
<head>
    <h1>Pengelolaan Data Warga</h1>
    <title>SIWET</title>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Data Warga</h3>
                       
                    </div>
                </div>
                <div class="card-body row">
                    <!-- Search and Filter Form -->
                    <form method="GET" action="{{ url('Warga') }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="filter" class="form-control">
                                    <option value="Semua" {{ request('filter') == 'Semua' ? 'selected' : '' }}>Semua Jenis Penduduk</option>
                                    @foreach($jenisPenduduk as $jp)
                                        <option value="{{ $jp->jenis_Penduduk }}" {{ request('filter') == $jp->jenis_Penduduk ? 'selected' : '' }}>
                                            {{ $jp->jenis_Penduduk }}
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
                        <a type="button" class="btn btn-info add-transaction-button" href="{{url('Warga/create')}}">Tambah</a>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            @foreach($dataWarga as $index => $warga)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
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
                                        <form id="deleteForm{{$warga->NIK}}" action="{{ url('Warga/delete/' . $warga->NIK) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button" onclick="confirmDeletion('deleteForm{{$warga->NIK}}')"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
    <script>
        function confirmDeletion(formId) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                document.getElementById(formId).submit();
            }
        }
        </script>
@endsection
