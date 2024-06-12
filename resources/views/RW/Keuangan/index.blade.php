@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan Keuangan RW</h1>
@endsection

@section('content')

    <head>
        <h1>Pengelolaan Keuangan Warga</h1>
    </head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Keuangan Warga</h3>

                    </div>
                </div>
                <div class="card-body row">
                    <!-- Search and Filter Form -->
                    <form method="GET" action="{{ url('KeuanganRW') }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search..."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="filter" class="form-control">
                                    <option value="">Select Jenis Transaksi</option>
                                    @foreach ($jenisTransaksi as $j)
                                        <option value="{{ $j->jenis_Transaksi }}"
                                            {{ request('filter') == $j->jenis_Transaksi ? 'selected' : '' }}>
                                            {{ $j->jenis_Transaksi }}
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
                        <a type="button" class="btn btn-info add-transaction-button"
                            href="{{ url('KeuanganRW/create') }}">Tambah</a>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Transaksi</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                                <th>Keterangan</th>
                                {{-- <th>Saldo</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKeuangan as $index => $KeuanganRW)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $KeuanganRW->jenis_Transaksi }}</td>
                                    <td>{{ $KeuanganRW->nominal }}</td>
                                    <td>{{ \Carbon\Carbon::parse($KeuanganRW->tanggal_Transaksi)->translatedFormat('d F Y') }}
                                    </td>
                                    <td>{{ $KeuanganRW->deskripsi }}</td>
                                    {{-- <td>{{ $KeuanganRW->saldo }}</td> --}}
                                    <td class="action-buttons">
                                        <a href="{{ url('KeuanganRW/show/' . $KeuanganRW->ID_Transaksi) }}"
                                            class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i>
                                            Detail</a>
                                        <a href="{{ url('KeuanganRW/edit/' . $KeuanganRW->ID_Transaksi) }}"
                                            class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                        <form id="deleteForm{{ $KeuanganRW->ID_Transaksi }}"
                                            action="{{ url('KeuanganRW/delete/' . $KeuanganRW->ID_Transaksi) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button" onclick="confirmDeletion('deleteForm{{ $KeuanganRW->ID_Transaksi }}')"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <!-- Optionally add summary row here -->
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
