@extends('layouts.templatePKK')
@section('title', 'Kegiatan PKK')

@section('content_header')
<h1>Pengelolaan Kegiatan PKK</h1>
@endsection

@section('content')
<head>
    <h1>Pengelolaan Kegiatan PKK</h1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Kegiatan PKK</h3>
                        
                    </div>
                </div>
                <div class="card-body row">
                    
                    <div class="col">
                        <form method="GET" action="{{ url('KegiatanPKK') }}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-4">
                                    <select name="filter" class="form-control">
                                        <option value="">Filter Penanggung Jawab</option>
                                        @foreach($penanggungJawab as $pj)
                                            <option value="{{ $pj->penanggung_Jawab }}" {{ request('filter') == $pj->penanggung_Jawab ? 'selected' : '' }}>
                                                {{ $pj->penanggung_Jawab }}
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
                        <a type="button" class="btn btn-info add-transaction-button" href="{{url('KegiatanPKK/create')}}">Tambah</a>
                    </div>
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

                            @foreach($dataKegiatan as $index => $KegiatanPKK)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{ $KegiatanPKK->nama_Kegiatan }}</td>
                                    <td>{{ $KegiatanPKK->waktu }}</td>
                                    <td>{{ $KegiatanPKK->tanggal }}</td>
                                    <td>{{ $KegiatanPKK->penanggung_Jawab }}</td>
                                    <td>{{ $KegiatanPKK->tempat }}</td>
                                    <td>{{ $KegiatanPKK->deskripsi }}</td>
                                    <td class="action-buttons">
                                        <a href="{{url('KegiatanPKK/show/' . $KegiatanPKK->ID_Kegiatan)}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{url('KegiatanPKK/edit/' . $KegiatanPKK->ID_Kegiatan)}}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{$KegiatanPKK->ID_Kegiatan}}" action="{{ url('KegiatanPKK/delete/' . $KegiatanPKK->ID_Kegiatan) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button" onclick="confirmDeletion('deleteForm{{$KegiatanPKK->ID_Kegiatan}}')"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
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
    <script>
        function confirmDeletion(formId) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                document.getElementById(formId).submit();
            }
        }
        </script>     
@endsection

