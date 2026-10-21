<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="footer-logo">
                    <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="IKKY LAUNDRYIN COIN" height="42" class="footer-logo-img" onerror="this.style.display='none'; document.getElementById('footerFallbackLogo').style.display='flex';">
                    <div id="footerFallbackLogo" style="display: none; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-tshirt"></i>
                        <span>IKKY LAUNDRYIN COIN</span>
                    </div>
                </div>
                <p>Solusi laundry koin mandiri yang praktis, bersih, dan higienis untuk aktivitas harianmu.</p>
                <p class="footer-tagline">"Cuci Bersih, Praktis, Tanpa Ribet!"</p>
                <div class="footer-owner-note">
                    <i class="fas fa-user-check"></i> Dikelola langsung oleh <strong>{{ $profile->owner_name ?? 'Ikky & Tim Laundryin' }}</strong>
                </div>
            </div>
            <div class="footer-links">
                <h4>Menu Cepat</h4>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#pemilik">Profil Pemilik</a></li>
                    <li><a href="#layanan">Layanan Mesin</a></li>
                    <li><a href="#keunggulan">Keunggulan</a></li>
                    <li><a href="#cara-kerja">Cara Kerja</a></li>
                    <li><a href="#galeri">Galeri Foto</a></li>
                    <li><a href="#kontak">Lokasi &amp; Kontak</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Hubungi &amp; Kunjungi</h4>
                <p><i class="fas fa-tag"></i> {{ $profile->price_info ?? 'Mulai dari Rp5.000 per kali cuci' }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $profile->address ?? 'Jl. Utama Laundry No. 88' }}</p>
                <p><i class="fas fa-clock"></i> {{ $profile->working_hours ?? 'Buka Setiap Hari: 06.00 – 22.00 WIB' }}</p>
                @php
                    $waNumber = $profile->whatsapp_number ?? '6281234567890';
                    $waLink = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $waNumber) . '?text=' . urlencode('Halo IKKY LAUNDRYIN COIN, saya ingin bertanya tentang layanan laundry.');
                @endphp
                <div class="footer-wa-action">
                    <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-footer">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp Resmi
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} IKKY LAUNDRYIN COIN. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
