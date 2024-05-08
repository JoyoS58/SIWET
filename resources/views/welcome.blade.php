@extends('layouts.template')

@section('content')
<br>
<section class="content">
      <div class="container-fluid">
        <h1>Dashboard</h1><br>
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              @php
                $jumlahWarga = \App\Models\Warga::count(); // Menghitung jumlah warga
              @endphp
              <div class="info-box-content">
                <span class="info-box-text text-center">Jumlah Warga</span>
                <span class="info-box-number text-center">
                  {{$jumlahWarga}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-center">Saldo Kas RW</span>
                <span class="info-box-number text-center">Rp. 271.000.000.000.000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              @php
                $jumlahRT = \App\Models\RT::count(); // Menghitung jumlah RT
              @endphp
              <div class="info-box-content">
                <span class="info-box-text text-center">Jumlah RT</span>
                <span class="info-box-number text-center">{{$jumlahRT}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tie"></i></span>

              @php
                $jumlahMahasiswa = \App\Models\MahasiswaKos::count(); // Menghitung jumlah warga
              @endphp
              <div class="info-box-content">
                <span class="info-box-text text-center">Jumlah Mahasiswa Kos</span>
                <span class="info-box-number text-center">{{$jumlahMahasiswa}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Kegiatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Pelaksanaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Kerja Bakti</td>
                      <td>17-04-2024</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Rapat Tahunan</td>
                      <td>18-04-2024</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Senam Bersama</td>
                      <td>19-04-2024</td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Memperingati Maulid Nabi</td>
                      <td>20-04-2024</td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Memperingati Hari Kemerdekaan</td>
                      <td>21-04-2024</td>
                    </tr>
                  </tbody>
                </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <!-- Tambahkan halaman lain jika diperlukan -->
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <!-- Info box untuk tabel kedua di samping -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Keuangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Jenis Transaksi</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>1.</td>
                                <td>Pemasukan</td>
                                <td>Rp. 100.000</td>
                                <td>Iuran Warga</td>
                                </tr>
                                <tr>
                                <td>2.</td>
                                <td>Pengeluaran</td>
                                <td>Rp. 200.000</td>
                                <td>Dana Kerja Bakti</td>
                                </tr>
                                <tr>
                                <td>3.</td>
                                <td>Pemasukan</td>
                                <td>Rp. 300.000</td>
                                <td>Pembayaran Kas</td>
                                </tr>
                                <tr>
                                <td>4.</td>
                                <td>Pengeluaran</td>
                                <td>Rp. 400.000</td>
                                <td>Pembayaran Sampah</td>
                                </tr>
                                <tr>
                                <td>5.</td>
                                <td>Pemasukan</td>
                                <td>Rp. 500.000</td>
                                <td>Sumbangan Warga</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <!-- Tambahkan halaman lain jika diperlukan -->
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
</section>
@endsection
