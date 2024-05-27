@extends('layouts.templatePKK')

@section('content')
<br>
<section class="content">
      <div class="container-fluid">
        <h1>Dashboard</h1><br>
        <!-- Info boxes -->
        <div class="row">
            <!-- Jumlah Anggota -->
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
  
                @php
                  $jumlahAnggota = \App\Models\AnggotaPKK::count(); // Menghitung jumlah warga
                @endphp
                <div class="info-box-content">
                  <span class="info-box-text text-center">Jumlah Anggota</span>
                  <span class="info-box-number text-center">
                    {{$jumlahAnggota}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- Saldo Kas PKK -->
            @php
              $KeuanganPKK = \App\Models\KeuanganPKK::latest()->first(); // Mengambil data saldo terbaru dari database
              $saldoFormatted = ($KeuanganPKK) ? number_format($KeuanganPKK->saldo, 0, ',', '.') : '0'; // Format jumlah saldo sesuai kebutuhan
            @endphp
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text text-center">Saldo Kas PKK</span>
                  <span class="info-box-number text-center">{{$saldoFormatted}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
          </div>
      </div>
      @php
      $Kegiatans = \App\Models\KegiatanPKK::all(); // Menghitung jumlah warga
      @endphp
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
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($Kegiatans as $index => $Kegiatan)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $Kegiatan->nama_Kegiatan }}</td>
                          <td>{{ $Kegiatan->tanggal }}</td>
                          <td>{{ $Kegiatan->deskripsi }}</td>
                      </tr>
                      @endforeach
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
                @php
                $Keuangans = \App\Models\KeuanganPKK::all(); // Menghitung jumlah warga
                @endphp
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
                                  @foreach($Keuangans as $index => $Keuangan)
                                  <tr>
                                      <td>{{ $index + 1 }}</td>
                                      <td>{{ $Keuangan->jenis_Transaksi }}</td>
                                      <td>{{ $Keuangan->nominal }}</td>
                                      <td>{{ $Keuangan->deskripsi }}</td>
                                  </tr>
                                  @endforeach
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
