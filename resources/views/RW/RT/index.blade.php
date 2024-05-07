
@extends('layouts.template')
@section('title', 'Pengelolaan Data RT')

@section('content_header')
    <h1>Pengelolaan Data RT</h1>
@endsection
@section('content')
<head>
<H1>Pengelolaan Data RT</H1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Data RT</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('RT/create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Ketua RT</th>
                                <th>Sekretaris RT</th>
                                <th>Bendahara RT</th>
                                <th>Nomor RT</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataRT as $rt)
                                <tr>
                                    <td>{{ $rt->ketua_RT }}</td>
                                    <td>{{ $rt->sekretaris_RT }}</td>
                                    <td>{{ $rt->bendahara_RT }}</td>
                                    <td>{{ $rt->nomor_RT }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ url('RT/show', $rt->ID_RT) }}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{ url('RT/edit', $rt->ID_RT) }}" class="btn btn-primary btn-sm edit-button" ><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
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
