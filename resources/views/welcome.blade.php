<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siwet - Landing page</title>

  <!-- 
    - favicon
  -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;900&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

  <!-- 
    - HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <!-- <a href="#" class="logo">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="Landio logo">
      </a> -->

      <button class="menu-toggle-btn" data-nav-toggle-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar">
        <ul class="navbar-list">

          <li>
            <a href="#hero" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="#features" class="navbar-link">Features</a>
          </li>
          <li>
            <a href="#blog" class="navbar-link">Kegiatan</a>
          </li>

        </ul>

        <div class="header-actions">
          <a href="{{ url('sesi') }}" class="header-action-link">Log in</a>
        </div>
      </nav>

    </div>
  </header>

  <main>
    <article>

      <!-- 
        - HERO
      -->

      <section class="hero" id="hero">
        <div class="container">

          <div class="hero-content">
            <h1 class="h1 hero-title">Welcome To Siwet</h1>
            <h1 class="hero-text">Sistem Informasi Warga Era Terbaru</h1>
          </div>

          <figure class="hero-banner">
            <img src="{{ asset('assets/images/rukun_warga.jpg') }}" alt="Hero image">
          </figure>

        </div>
      </section>

      <!-- 
        - ABOUT
      -->

      <section class="about">
        <div class="container">

          <div class="about-content">

            <div class="about-icon">
              <ion-icon name="cube"></ion-icon>
            </div>

            <h2 class="h2 about-title">RW Management system</h2>

            <p class="about-text">
              Mengatur struktur organisasi yang efisien dan jelas untuk memudahkan pelaksanaan tugas dan tanggung jawab.
            </p>

            <button class="btn btn-outline">Learn More</button>

          </div>

          <ul class="about-list">

            <li>
              <div class="about-card">

                <div class="card-icon">
                  <ion-icon name="thumbs-up"></ion-icon>
                </div>

                <h3 class="h3 card-title">Manajemen Data Warga</h3>

                <p class="card-text">
                  Melindungi data pribadi warga dari akses yang tidak sah atau penyalahgunaan adalah prioritas utama.
                </p>

              </div>
            </li>

            <li>
              <div class="about-card">

                <div class="card-icon">
                  <ion-icon name="trending-up"></ion-icon>
                </div>

                <h3 class="h3 card-title"> Manajemen Kegiatan</h3>

                <p class="card-text">
                  Mengelola kegiatan dengan efisien membantu memaksimalkan penggunaan waktu dan sumber daya.
                </p>

              </div>
            </li>

            <li>
              <div class="about-card">

                <div class="card-icon">
                  <ion-icon name="shield-checkmark"></ion-icon>
                </div>

                <h3 class="h3 card-title">Memberikan Rekomendasi Keputusan</h3>

                <p class="card-text">
                  Menyediakan rekomendasi keputusan pinjaman yang disesuaikan dengan kebutuhan dan profil individu peminjam.
                </p>

              </div>
            </li>

            <li>
              <div class="about-card">

                <div class="card-icon">
                  <ion-icon name="server"></ion-icon>
                </div>

                <h3 class="h3 card-title">Manajemen Keuangan</h3>

                <p class="card-text">
                  Manajemen keuangan yang baik membantu menciptakan stabilitas keuangan dalam jangka panjang.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>

      <section class="features" id="features">
        <div class="container">
      
          <h2 class="h2 section-title">Fitur-fitur Utama</h2>
      
          <p class="section-text">
            Berikut adalah fitur-fitur utama yang tersedia pada platform kami.
          </p>
      
          <div class="features-wrapper">
      
            <figure class="features-banner">
              <img src="{{ asset('assets/images/features-img-1.png') }}" alt="illustration art">
            </figure>
      
            <div class="features-content">
      
              <p class="features-content-subtitle">
                <ion-icon name="person-outline"></ion-icon>
      
                <span>Pengelolaan Data Warga</span>
              </p>
      
              <h3 class="features-content-title">
                Kelola data warga dengan <strong>mudah</strong> dan <strong>efisien</strong>.
              </h3>
      
              <p class="features-content-text">
                Fitur ini memungkinkan Anda untuk merekam dan mengelola informasi lengkap tentang penduduk secara sistematis.
              </p>
      
              <div class="btn-group">
                <button class="btn btn-primary">Baca Selengkapnya</button>
              </div>
      
            </div>
      
          </div>
      
          <div class="features-wrapper">
      
            <figure class="features-banner">
              <img src="{{ asset('assets/images/features-img-2.png') }}" alt="illustration art">
            </figure>
      
            <div class="features-content">
      
              <p class="features-content-subtitle">
                <ion-icon name="calendar-outline"></ion-icon>
      
                <span>Pengelolaan Kegiatan</span>
              </p>
      
              <h3 class="features-content-title">
                Rencanakan dan catat <strong>berbagai kegiatan</strong> dengan mudah.
              </h3>
      
              <p class="features-content-text">
                Fitur ini memungkinkan Anda untuk mencatat, mengatur, dan memantau berbagai kegiatan yang diadakan.
              </p>
      
              <div class="btn-group">
                <button class="btn btn-primary">Baca Selengkapnya</button>
              </div>
      
            </div>
      
          </div>
      
          <!-- Tambahkan fitur-fitur lainnya sesuai kebutuhan -->
      
        </div>
      </section>

      <!-- 
        - BLOG
      -->

      <section class="blog" id="blog">
        @php
$Kegiatans = \App\Models\KegiatanRW::all(); // Menghitung jumlah warga
@endphp

{{-- <!DOCTYPE html>
<html lang="en"> --}}

    <!-- Bootstrap CSS -->

    <div class="container mt-4">
      <h2 class="h2 section-title">Kegiatan Warga</h2>
        <p class="section-text">
            Kegiatan Yang Dilakukan di RW 10 jln oro oro dowo .
        </p>

        <div class="row">
            @foreach($Kegiatans as $Kegiatan)
            <div class="col-md-4 mb-3">
                <div class="blog-card">
                    <figure class="hero-banner">
                        <img src="{{ asset('assets/images/rukun_warga3.jpg') }}" alt="Best Traveling Place">
                    </figure>

                    <div class="blog-meta">
                        <span>
                            <ion-icon name="calendar-outline"></ion-icon>
                            <time datetime="{{ $Kegiatan->tanggal }}">{{ $Kegiatan->tanggal }}</time>
                        </span>

                        <span>
                            <ion-icon name="person-outline"></ion-icon>
                            <p>admin</p>
                        </span>
                    </div>

                    <h3 class="blog-title">{{ $Kegiatan->nama_Kegiatan }}</h3>

                    <p class="blog-text">{{ $Kegiatan->deskripsi }}</p>

                    <a href="#" class="blog-link-btn">
                        <span>Learn More</span>
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      </section>



      {{-- kegiatan pkk --}}

      <section class="blog" id="blog">
        @php
            $Kegiatans = \App\Models\KegiatanPKK::all(); // Menghitung jumlah warga
        @endphp
    
        <div class="container mt-4">
            <h2 class="h2 section-title">Kegiatan PKK</h2>
            <p class="section-text">
                Kegiatan Yang Dilakukan di RW 10 jln oro oro dowo.
            </p>
    
            <div class="row">
                @foreach($Kegiatans as $Kegiatan)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/rukun_warga3.jpg') }}" class="card-img-top" alt="Kegiatan PKK">
                            <div class="card-body">
                                <h5 class="card-title">{{ $Kegiatan->nama_Kegiatan }}</h5>
                                <p class="card-text">{{ $Kegiatan->deskripsi }}</p>
                                <div class="blog-meta">
                                    <span>
                                        <ion-icon name="calendar-outline"></ion-icon>
                                        <time datetime="{{ $Kegiatan->tanggal }}">{{ $Kegiatan->tanggal }}</time>
                                    </span>
                                    <span>
                                        <ion-icon name="person-outline"></ion-icon>
                                        <p>admin</p>
                                    </span>
                                </div>
                                <a href="#" class="btn btn-primary blog-link-btn">
                                    <span>Learn More</span>
                                    <ion-icon name="chevron-forward-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
      <!-- 
        - CONTACT
      -->

      {{-- <section class="contact" id="contact">
        <div class="container">
          <h2 class="h2 section-title">Pengajuan Pinjaman Pra Koperasi</h2>
          <p class="section-text">
            Silakan lengkapi formulir di bawah ini untuk mengajukan pinjaman pra koperasi.
          </p>
          <div class="contact-wrapper">
            <form action="" class="contact-form">
              <div class="wrapper-flex">
                <div class="input-wrapper">
                  <label for="name">Nama*</label>
                  <input type="text" name="name" id="name" required placeholder="Masukkan Nama Anda" class="input-field">
                </div>
                <div class="input-wrapper">
                  <label for="email">Email*</label>
                  <input type="email" name="email" id="email" required placeholder="Masukkan Email Anda" class="input-field">
                </div>
                <div class="input-wrapper">
                  <label for="phone">Nomor Telepon*</label>
                  <input type="tel" name="phone" id="phone" required placeholder="Masukkan Nomor Telepon Anda" class="input-field">
                </div>
                <div class="input-wrapper">
                  <label for="amount">Jumlah Pinjaman*</label>
                  <input type="number" name="amount" id="amount" required placeholder="Masukkan Jumlah Pinjaman" class="input-field">
                </div>
              </div>
              <div class="input-wrapper">
                <label for="purpose">Tujuan Pinjaman*</label>
                <textarea name="purpose" id="purpose" required placeholder="Tuliskan Tujuan Penggunaan Pinjaman Anda" class="input-field"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">
                <span>Kirim Pengajuan</span>
                <ion-icon name="paper-plane-outline"></ion-icon>
              </button>
            </form>
            <ul class="contact-list">
              <li>
                <a href="mailto:support@website.com" class="contact-link">
                  <ion-icon name="mail-outline"></ion-icon>
                  <span>: support@website.com</span>
                </a>
              </li>
              <li>
                <a href="#" class="contact-link">
                  <ion-icon name="globe-outline"></ion-icon>
                  <span>: www.website.com</span>
                </a>
              </li>
              <li>
                <a href="tel:+0011234567890" class="contact-link">
                  <ion-icon name="call-outline"></ion-icon>
                  <span>: (+001) 123 456 7890</span>
                </a>
              </li>
              <li>
                <div class="contact-link">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>: 9:00 AM - 6:00 PM</span>
                </div>
              </li>
              <li>
                <a href="#" class="contact-link">
                  <ion-icon name="location-outline"></ion-icon>
                  <address>: jln ijen kelurahan oro-oro dowo</address>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </section> --}}

    </article>
  </main>

  <!-- 
    - FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <ul class="footer-list">

        <li>
          <a href="#" class="footer-link">Privasi</a>
        </li>

        <li>
          <a href="#" class="footer-link">Syarat & Ketentuan</a>
        </li>

        <li>
          <a href="#" class="footer-link">Bantuan</a>
        </li>

      </ul>

      <p class="copyright">
        &copy; {{ date('Y') }} <a href="#">Siwet</a>. All Rights Reserved.
      </p>

    </div>
  </footer>

  <!-- 
    - custom js link
  -->
  <script src="{{ asset('assets/js/script.js') }}" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>

</body>

</html>
