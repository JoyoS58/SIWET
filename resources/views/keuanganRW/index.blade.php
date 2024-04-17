@extends('layouts.template')
@section('title', 'Pengelolaan Kas RW')

@section('content_header')
    <h1>Pengelolaan KEUANGAN RW</h1>
@endsection
@section('content')
<head>
<H1>PENGELOLAAN KEUANGAN RW</H1>
</head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6">
                          <h3 class="card-title">Pengelolaan Keuangan Rukun Warga</h3>
                        </div>
                        <div class="col-md-6 text-right">
                          <p><button type="button" class="btn btn-info add-transaction-button" data-toggle="modal" data-target="#transactionModal">Add Transaksi</button></p>
                        </div>
                      </div>                      
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
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Pemasukan</td>
                                <td>100.000</td>
                                <td>2 April 2023</td>
                                <td>Pembayaran Kas</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Pengeluaran</td>
                                <td>50.000</td>
                                <td>3 Apr 2023</td>
                                <td>Dana Kerja Bakti</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Pemasukan</td>
                                <td>100.000</td>
                                <td>5 Apr 2023</td>
                                <td>Pembayaran Kas</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Pengeluaran</td>
                                <td>50.000</td>
                                <td>6 April 2023</td>
                                <td>Pembayaran Sampan</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>Pemasukan</td>
                                <td>200.000</td>
                                <td>7 April 2023</td>
                                <td>Sumbangan Acara Maulid Nabi</td>
                                <td class="action-buttons">
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        </tbody>
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

    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="transactionModalLabel">FORM TAMBAH TRANSAKSI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="transactionForm">
                <div class="form-group">
                  <label for="transactionType">Jenis Transaksi:</label>
                  <select class="form-control" id="transactionType">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nominal">Nominal:</label>
                  <input type="number" class="form-control" id="nominal" placeholder="Masukkan nominal">
                </div>
                <div class="form-group">
                  <label for="tanggalTransaksi">Tanggal Transaksi:</label>
                  <input type="date" class="form-control" id="tanggalTransaksi">
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <textarea class="form-control" id="keterangan" rows="3"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveTransactionButton">Save</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="transactionModalEdit" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="transactionModalLabel">FORM EDIT TRANSAKSI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="transactionForm">
                <input type="hidden" id="transactionId" name="transactionId"> <div class="form-group">
                  <label for="transactionType">Jenis Transaksi:</label>
                  <select class="form-control" id="transactionType" name="transactionType">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nominal">Nominal:</label>
                  <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan nominal">
                </div>
                <div class="form-group">
                  <label for="tanggalTransaksi">Tanggal Transaksi:</label>
                  <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi">
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveTransactionButton">Save</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus transaksi ini?</p>
                    <p id="transactionDetails"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
