<!-- ==========================================================================
     GALERI FOTO SECTION - IKKY LAUNDRYIN COIN
     Galeri 6 Slot Gambar + Vanilla JS Lightbox
     ========================================================================== -->
<section class="section" id="galeri" aria-labelledby="galleryTitle">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">Foto Outlet</span>
      <h2 class="section-title" id="galleryTitle">Suasana &amp; Fasilitas Outlet</h2>
      <p class="section-subtitle">
        Lihat langsung kebersihan, kenyamanan area tunggu, serta mesin modern di IKKY LAUNDRYIN COIN. Klik foto untuk memperbesar.
      </p>
    </div>

    <!-- Gallery Grid (6 Slot Foto) -->
    <div class="gallery-grid">
      <!-- Slot 1: Interior laundry -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Ruang Tunggu Bersih &amp; Adem" data-full-img="{{ asset('assets/images/gallery/gallery-interior.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-interior.jpg') }}" alt="Ruang tunggu laundry bersih dan nyaman" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Interior Laundry</span>
          <h3 class="gallery-card-title">Ruang Tunggu Bersih &amp; Adem</h3>
        </div>
      </div>

      <!-- Slot 2: Mesin cuci -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Deretan Mesin Cuci Siap Pakai" data-full-img="{{ asset('assets/images/gallery/gallery-washer.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-washer.jpg') }}" alt="Deretan mesin cuci koin komersial modern" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Mesin Cuci</span>
          <h3 class="gallery-card-title">Deretan Mesin Cuci Siap Pakai</h3>
        </div>
      </div>

      <!-- Slot 3: Mesin pengering -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Mesin Pengering 100% Cepat Kering" data-full-img="{{ asset('assets/images/gallery/gallery-dryer.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-dryer.jpg') }}" alt="Mesin dryer tumble pengering pakaian" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Mesin Pengering</span>
          <h3 class="gallery-card-title">Pengering 100% Cepat Kering</h3>
        </div>
      </div>

      <!-- Slot 4: Fasilitas -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Fasilitas Penukar Koin &amp; Meja Lipat" data-full-img="{{ asset('assets/images/gallery/gallery-facility.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-facility.jpg') }}" alt="Fasilitas penukar koin dan meja lipat pakaian" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Fasilitas</span>
          <h3 class="gallery-card-title">Penukar Koin &amp; Meja Lipat</h3>
        </div>
      </div>

      <!-- Slot 5: Area laundry -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Area Laundry Luas &amp; Terawat" data-full-img="{{ asset('assets/images/gallery/gallery-area.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-area.jpg') }}" alt="Area laundry bersih dan tertata rapi" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Area Laundry</span>
          <h3 class="gallery-card-title">Area Laundry Luas &amp; Terawat</h3>
        </div>
      </div>

      <!-- Slot 6: Pakaian bersih -->
      <div class="gallery-card" tabindex="0" role="button" aria-label="Lihat foto: Hasil Pakaian Bersih, Wangi &amp; Rapi" data-full-img="{{ asset('assets/images/gallery/gallery-clothes.jpg') }}">
        <img src="{{ asset('assets/images/gallery/gallery-clothes.jpg') }}" alt="Hasil cucian bersih, wangi, dan rapi" loading="lazy" onerror="this.src='{{ asset('assets/images/placeholder-laundry.svg') }}'">
        <div class="gallery-card-overlay">
          <div class="gallery-zoom-icon" aria-hidden="true">🔍</div>
          <span class="gallery-card-category">Pakaian Bersih</span>
          <h3 class="gallery-card-title">Hasil Cucian Rapi &amp; Wangi</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Lightbox Modal Vanilla JS -->
<div class="lightbox-modal" id="galleryLightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Pratinjau Foto Galeri">
  <button type="button" class="lightbox-close-btn" id="lightboxClose" aria-label="Tutup foto">&times;</button>

  <button type="button" class="lightbox-nav-btn lightbox-prev-btn" id="lightboxPrev" aria-label="Foto Sebelumnya">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
    </svg>
  </button>

  <button type="button" class="lightbox-nav-btn lightbox-next-btn" id="lightboxNext" aria-label="Foto Berikutnya">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </svg>
  </button>

  <div class="lightbox-content">
    <div class="lightbox-img-wrapper">
      <img src="" alt="" id="lightboxImg">
    </div>
    <div class="lightbox-caption">
      <div class="lightbox-caption-cat" id="lightboxCategory">Kategori</div>
      <div class="lightbox-caption-title" id="lightboxTitle">Judul Foto</div>
    </div>
  </div>
</div>
