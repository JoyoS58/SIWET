@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan Kas RW</h1>
@endsection
@section('')
@endsection
@section('content')
<head>
<H1>PENGELOLAAN KAS RW</H1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengelolaan Kas Rukun Warga</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Jenis Transaksi</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <BR></BR>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Pemasukan</td>
                                <td>100.000</td>
                                <td>2 April 2023</td>
                                <td>Pembayaran Kas</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-default btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-info btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>

                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Pengeluaran</td>
                                <td>50.000</td>
                                <td>3 Apr 2023</td>
                                <td>Dana Kerja Bakti</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-default btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-info btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Pemasukan</td>
                                <td>100.000</td>
                                <td>5 Apr 2023</td>
                                <td>Pembayaran Kas</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-default btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-info btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Pengeluaran</td>
                                <td>50.000</td>
                                <td>6 April 2023</td>
                                <td>Pembayaran Sampan</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-default btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-info btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>Pemasukan</td>
                                <td>200.000</td>
                                <td>7 April 2023</td>
                                <td>Sumbangan Acara Maulid Nabi</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-default btn-sm edit-button"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-info btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        </tbody>
                        <br>
                        <tfoot>
                            <tr>
                                <th colspan="5">TOTAL KAS</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
