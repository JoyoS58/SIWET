@extends('layouts.template')
@section('title', 'Kegiatan RW')

@section('content_header')
    <h1>Pengelolaan Kegiatan RW</h1>
@endsection

@section('content')

    <head>
        <h1>Pengelolaan Kegiatan Warga</h1>
        <title>SIWET</title>
    </head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Kegiatan Warga</h3>

                    </div>
                </div>
                <div class="card-body row">
                    <div class="col">
                        <form method="GET" action="{{ url('KegiatanRW') }}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="Search..."
                                        value="{{ request('search') }}">
                                </div>
                                <div class="col-md-4">
                                    <select name="filter" class="form-control">
                                        <option value="">Filter Penanggung Jawab</option>
                                        @foreach ($penanggungJawab as $pj)
                                            <option value="{{ $pj->penanggung_Jawab }}"
                                                {{ request('filter') == $pj->penanggung_Jawab ? 'selected' : '' }}>
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
                        <a type="button" class="btn btn-info add-transaction-button"
                            href="{{ url('KegiatanRW/create') }}">Tambah</a>
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
                                {{-- <th>Gambar</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKegiatan as $index => $KegiatanRW)
                                <tr>
                                    {{-- <td>{{ $KegiatanRW->ID_Kegiatan_RW }}</td> --}}
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $KegiatanRW->nama_Kegiatan }}</td>
                                    <td>{{ $KegiatanRW->waktu }}</td>
                                    <td>{{ $KegiatanRW->tanggal }}</td>
                                    <td>{{ $KegiatanRW->penanggung_Jawab }}</td>
                                    <td>{{ $KegiatanRW->tempat }}</td>
                                    <td>{{ $KegiatanRW->deskripsi }}</td>
                                    {{-- <td><img src="{{asset('storage/inventaris/' . $KegiatanRW->gambar)}}" alt="Kegiatan"></td> --}}
                                    <td class="action-buttons">
                                        <a href="{{ url('KegiatanRW/show/' . $KegiatanRW->ID_Kegiatan_RW) }}"
                                            class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i>
                                            Detail</a>
                                        <a href="{{ url('KegiatanRW/edit/' . $KegiatanRW->ID_Kegiatan_RW) }}"
                                            class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{ $KegiatanRW->ID_Kegiatan_RW }}"
                                            action="{{ url('KegiatanRW/delete/' . $KegiatanRW->ID_Kegiatan_RW) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button"
                                                onclick="confirmDeletion('deleteForm{{ $KegiatanRW->ID_Kegiatan_RW }}')"><i
                                                    class="fas fa-trash"></i> Delete</button>
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
