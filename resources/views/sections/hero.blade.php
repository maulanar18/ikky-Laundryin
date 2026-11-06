@php
    $startingPrice = $startingPrice ?? 'Mulai Rp5.000/kali cuci';
@endphp

<!-- ==========================================================================
     HERO SECTION - IKKY LAUNDRYIN COIN
     Desain Simpel, Ramah untuk Emak-emak & Anak Muda
     ========================================================================== -->
<section class="hero-section" id="beranda" aria-labelledby="heroTitle">
  <div class="container">
    <div class="hero-grid">
      <!-- Kolom Teks & Ajakan Utama -->
      <div class="hero-content">
        <!-- Badge Harga Ramah di Kantong -->
        <div class="hero-badge-container">
          <div class="hero-price-badge" role="note" aria-label="Tarif hemat laundry">
            <span class="coin-bullet">¢</span>
            <strong>{{ $startingPrice }}</strong>
          </div>
        </div>

        <!-- Judul Utama yang Mudah Dipahami -->
        <h1 class="hero-title" id="heroTitle">
          Laundry Praktis, <span class="highlight-blue">Bersih</span>, Tanpa Ribet!
        </h1>

        <!-- Deskripsi yang Ramah & Jelas -->
        <p class="hero-description">
          Solusi laundry mandiri yang praktis untuk membantu aktivitas harianmu. Cukup gunakan koin, pilih mesin, dan nikmati kemudahan mencuci serta mengeringkan pakaian dengan cepat, nyaman, dan higienis.
        </p>

        <!-- 3 Poin Kunci yang Langsung Menjawab Kebutuhan -->
        <div class="hero-key-points">
          <div class="hero-key-item">
            <span class="key-icon">✓</span>
            <span><strong>1 Mesin Khusus Kamu:</strong> Nggak dicampur baju orang lain</span>
          </div>
          <div class="hero-key-item">
            <span class="key-icon">✓</span>
            <span><strong>Kering Tuntas 100%:</strong> Siap lipat, nggak perlu dijemur</span>
          </div>
          <div class="hero-key-item">
            <span class="key-icon">✓</span>
            <span><strong>Tinggal Masuk Koin:</strong> Gak ribet, langsung otomatis jalan</span>
          </div>
        </div>

        <!-- Tombol Aksi Sederhana -->
        <div class="hero-actions">
          <a href="#layanan" class="btn btn-primary btn-lg" title="Lihat Layanan Kami">
            Jelajahi Layanan
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
          </a>
          <a href="#tentang-kami" class="btn btn-outline btn-lg" title="Kenali IKKY LAUNDRYIN COIN">
            Tentang Kami
          </a>
        </div>
      </div>

      <!-- Kolom Foto Outlet yang Hangat & Bersih -->
      <div class="hero-media">
        <div class="hero-image-wrapper">
          <img src="{{ asset('assets/images/hero/hero-laundry.jpg') }}" alt="Interior laundry koin IKKY LAUNDRYIN COIN yang bersih dan nyaman" width="600" height="480" fetchpriority="high">
        </div>
        
        <!-- Kartu Catatan Simpel & Bersahabat -->
        <div class="hero-note-card">
          <div class="hero-note-icon">🧺</div>
          <div class="hero-note-text">
            <strong>Bisa Ditunggu Sambil Santai</strong>
            <span>Ruangan bersih, adem &amp; nyaman untuk keluarga</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
