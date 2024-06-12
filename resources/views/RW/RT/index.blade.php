@extends('layouts.template')
@section('title', 'Pengelolaan Data RT')

@section('content_header')
    <h1>Pengelolaan Data RT</h1>
@endsection
@section('content')
<head>
    <h1>Pengelolaan Data RT</h1>
</head>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title">Pengelolaan Data RT</h3>
                    
                </div>
            </div>
            <div class="card-body row">
                <!-- Search and Filter Form -->
                <form method="GET" action="{{ url('RT') }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="filter" class="form-control">
                                <option value="">Semua RT</option>
                                @foreach($nomorRT as $n)
                                    <option value="{{ $n->nomor_RT }}" {{ request('filter') == $n->nomor_RT ? 'selected' : '' }}>
                                        {{ $n->nomor_RT }}
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
                    <a type="button" class="btn btn-info add-transaction-button" href="{{ url('RT/create') }}">Tambah</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ketua RT</th>
                            <th>Sekretaris RT</th>
                            <th>Bendahara RT</th>
                            <th>Nomor RT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRT as $index => $RT)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $RT->ketua_RT }}</td>
                                <td>{{ $RT->sekretaris_RT }}</td>
                                <td>{{ $RT->bendahara_RT }}</td>
                                <td>{{ $RT->nomor_RT }}</td>
                                <td class="action-buttons">
                                    <a href="{{ url('RT/show', $RT->ID_RT) }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="{{ url('RT/edit', $RT->ID_RT) }}" class="btn btn-primary btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <form id="deleteForm{{ $RT->ID_RT }}" action="{{ url('RT/delete/' . $RT->ID_RT) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-button" onclick="confirmDeletion('deleteForm{{ $RT->ID_RT }}')"><i class="fas fa-trash"></i> Delete</button>
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
