
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
                            <button type="button" class="btn btn-info add-transaction-button" data-toggle="modal" data-target="#transactionModal">Tambah</button>
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
                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#transactionModalEdit"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="#" class="btn btn-success btn-sm detail-button"><i class="fas fa-info-circle"></i> Detail</a>
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

    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="transactionModalLabel">FORM Input Data Warga</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="residentForm">  <div class="form-group">
                  <label for="nik">NIK:</label>
                  <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK">
                </div>
                <div class="form-group">
                  <label for="noKk">No. KK:</label>
                  <input type="text" class="form-control" id="noKk" placeholder="Masukkan No. KK">
                </div>
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="tanggalLahir">Tanggal Lahir:</label>
                  <input type="date" class="form-control" id="tanggalLahir">
                </div>
                <div class="form-group">
                  <label for="jenisKelamin">Jenis Kelamin:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminLaki" value="laki-laki">
                    <label class="form-check-label" for="jenisKelaminLaki">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminPerempuan" value="perempuan">
                    <label class="form-check-label" for="jenisKelaminPerempuan">Perempuan</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                </div>
                <div class="form-group">
                  <label for="agama">Agama:</label>
                  <select class="form-control" id="agama">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="jenisPenduduk">Jenis Penduduk:</label>
                    <select class="form-control" id="jenisPenduduk">
                      <option value="">Pilih Jenis Penduduk</option>
                      <option value="tetap">Penduduk Tetap</option>
                      <option value="tidak_tetap">Penduduk Tidak Tetap</option>
                      <option value="domisili">Penduduk Domisili</option>
                      <option value="lainnya">Lainnya</option>
                    </select>
                  </div>
                  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveResidentButton">Save</button> </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="transactionModalLabel">FORM Edit Data Warga</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="residentForm">
                <div class="form-group">
                  <label for="nik">NIK:</label>
                  <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK" disabled>
                </div>
                <div class="form-group">
                  <label for="noKk">No. KK:</label>
                  <input type="text" class="form-control" id="noKk" placeholder="Masukkan No. KK">
                </div>
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="tanggalLahir">Tanggal Lahir:</label>
                  <input type="date" class="form-control" id="tanggalLahir">
                </div>
                <div class="form-group">
                  <label for="jenisKelamin">Jenis Kelamin:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminLaki" value="laki-laki">
                    <label class="form-check-label" for="jenisKelaminLaki">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminPerempuan" value="perempuan">
                    <label class="form-check-label" for="jenisKelaminPerempuan">Perempuan</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                </div>
                <div class="form-group">
                  <label for="agama">Agama:</label>
                  <select class="form-control" id="agama">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenisPenduduk">Jenis Penduduk:</label>
                  <select class="form-control" id="jenisPenduduk">
                    <option value="">Pilih Jenis Penduduk</option>
                    <option value="tetap">Penduduk Tetap</option>
                    <option value="tidak_tetap">Penduduk Tidak Tetap</option>
                    <option value="domisili">Penduduk Domisili</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveResidentButton">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="detailModalLabel">DETAIL Data Warga</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="detailNik">NIK:</label>
                    <input type="number" class="form-control" id="detailNik" placeholder="NIK" disabled>
                  </div>
                  <div class="form-group">
                    <label for="detailNoKk">No. KK:</label>
                    <input type="text" class="form-control" id="detailNoKk" placeholder="No. KK" disabled>
                  </div>
                  <div class="form-group">
                    <label for="detailNama">Nama:</label>
                    <input type="text" class="form-control" id="detailNama" placeholder="Nama Lengkap" disabled>
                  </div>
                  <div class="form-group">
                    <label for="detailTanggalLahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="detailTanggalLahir" placeholder="Tanggal Lahir" disabled>
                  </div>
                  <div class="form-group">
                    <label for="detailJenisKelamin">Jenis Kelamin:</label>
                    <input type="text" class="form-control" id="detailJenisKelamin" placeholder="Jenis Kelamin" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="detailAlamat">Alamat:</label>
                    <textarea class="form-control" id="detailAlamat" rows="3" placeholder="Alamat Lengkap" disabled></textarea>
                  </div>
                  <div class="form-group">
                    <label for="detailAgama">Agama:</label>
                    <input type="text" class="form-control" id="detailAgama" placeholder="Agama" disabled>
                  </div>
                  <div class="form-group">
                    <label for="detailJenisPenduduk">Jenis Penduduk:</label>
                    <input type="text" class="form-control" id="detailJenisPenduduk" placeholder="Jenis Penduduk" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>      
          </div>
        </div>
      </div>      
@endsection
