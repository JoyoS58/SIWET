
@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan Data Warga</h1>
@endsection
@section('content')
<head>
<H1>PENGELOLAAN Data Warga</H1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title">Pengelolaan Data Warga</h3>
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info add-transaction-button" href="{{url('warga/create')}}">tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0199797968</td>
                                <td>Riski</td>
                                <td>0856896</td>
                                <td>jln pisang kipas no 8</td>
                                <td>laki-laki</td>
                                <td class="action-buttons">
                                    <a href="{{url('warga/edit')}}" class="btn btn-primary btn-sm edit-button" ><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="{{url('warga/show')}}" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>0279e969688</td>
                                <td>Indra</td>
                                <td>085786543</td>
                                <td>jln senggani no 8</td>
                                <td>laki-laki</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>0380807976</td>
                                <td>elsa</td>
                                <td>08654333</td>
                                <td>jln senggani no 25</td>
                                <td>perempuan</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>0481757573</td>
                                <td>Nanda Hamida</td>
                                <td>08765432</td>
                                <td>jln remujung no 14</td>
                                <td>perempuan</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>0587976868</td>
                                <td>sugit</td>
                                <td>0976543w3</td>
                                <td>jln pisang kipas n0 8</td>
                                <td>laki-laki</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>     
@endsection
