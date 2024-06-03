<div class="sidebar text-white" style="position: fixed">
    <a href="{{ url('/PKK')}}" class="brand-link text-white">
      <img src="{{ asset('assets/images/logo.jpg') }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Admin PKK</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/PKK') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Anggota</li>
            <li class="nav-item">
                <a href="{{ url('/AnggotaPKK') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Anggota</p>
                </a>
            </li>
            <li class="nav-header">Keuangan</li>
            <li class="nav-item">
                <a href="{{ url('/KeuanganPKK') }}" class="nav-link text-white">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Keuangan</p>
                </a>
            </li>
            <li class="nav-header">Kegiatan</li>
            <li class="nav-item">
                <a href="{{ url('/KegiatanPKK') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Kegiatan</p>
                </a>
            </li>
            <li class="nav-header">Sistem Pendukung Keputusan</li>
                <ul>
                    <li class="nav-item">
                        <a href="{{ url('/spk/alternatif') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-"></i>
                            <p>Data Alternatif</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/kriteria') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Data Kriteria</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/dataKriteria') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Data Nilai Kriteria</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/spk/pemilihan') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Pemilihan</p>
                        </a>
                    </li>
                </ul>
        </ul>
        <a href="{{ url('/logout') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Logout</p>
        </a>
    </nav>
</div>
