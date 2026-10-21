<nav class="navbar" id="navbar">
    <div class="container navbar-inner">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-brand" title="IKKY LAUNDRYIN COIN">
            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="IKKY LAUNDRYIN COIN" height="38" class="navbar-logo-img" onerror="this.style.display='none'; document.getElementById('navbarFallbackBrand').style.display='flex';">
            <div class="navbar-fallback-brand" id="navbarFallbackBrand" style="display: none;">
                <div class="navbar-logo">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="navbar-brand-text">
                    <span class="brand-name">IKKY LAUNDRYIN</span>
                    <span class="brand-sub">COIN</span>
                </div>
            </div>
        </a>

        <!-- Desktop & Mobile Nav Menu -->
        <div class="navbar-collapse" id="navCollapse">
            <ul class="navbar-nav" id="navMenu">
                <li class="nav-item">
                    <a href="#beranda" class="nav-link active">
                        <i class="fas fa-home nav-icon-mobile"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tentang" class="nav-link">
                        <i class="fas fa-info-circle nav-icon-mobile"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#pemilik" class="nav-link">
                        <i class="fas fa-user-tie nav-icon-mobile"></i>
                        <span>Profil Pemilik</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#layanan" class="nav-link">
                        <i class="fas fa-soap nav-icon-mobile"></i>
                        <span>Layanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#cara-kerja" class="nav-link">
                        <i class="fas fa-coins nav-icon-mobile"></i>
                        <span>Cara Kerja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#galeri" class="nav-link">
                        <i class="fas fa-images nav-icon-mobile"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#kontak" class="nav-link">
                        <i class="fas fa-map-marker-alt nav-icon-mobile"></i>
                        <span>Kontak</span>
                    </a>
                </li>
                <li class="nav-cta-item">
                    @php
                        $waNumber = $profile->whatsapp_number ?? '6281234567890';
                        $waClean = preg_replace('/[^0-9]/', '', $waNumber);
                        $waLink = 'https://wa.me/' . $waClean . '?text=' . urlencode('Halo IKKY LAUNDRYIN COIN, saya ingin bertanya seputar layanan laundry koin.');
                    @endphp
                    <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-nav" title="Chat WhatsApp Outlet">
                        <i class="fab fa-whatsapp"></i>
                        <span>Chat WhatsApp</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Hamburger Toggler -->
        <button class="navbar-toggler" id="navToggler" aria-label="Buka Menu Navigasi" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>
