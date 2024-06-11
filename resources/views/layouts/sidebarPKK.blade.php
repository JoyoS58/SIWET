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
                        <a href="{{ url('/alternatif') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Data Alternatif</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/kriteria') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Data Kriteria</p>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('/dataKriteria') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Data Nilai Kriteria</p>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url('/saw/calculate') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>SAW</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/topsis') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>TOPSIS</p>
                        </a>
                    </li>
                </ul>
        </ul>
        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <a href="#" class="nav-link text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
        </a> --}}
    </nav>
</div>
