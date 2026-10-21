/**
 * IKKY LAUNDRYIN COIN - Frontend Main Script
 * Vanilla JavaScript (No heavy frameworks / Node requirements)
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initSlideshow();
    initLightbox();
    initSmoothScroll();
    initChatbot();
});

/* ============================================================
   NAVBAR & MOBILE MENU
   ============================================================ */
function initNavbar() {
    const navbar = document.getElementById('navbar');
    const toggler = document.getElementById('navToggler');
    const collapse = document.getElementById('navCollapse') || document.getElementById('navMenu');

    // Sticky shadow on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile hamburger toggle
    if (toggler && collapse) {
        toggler.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = collapse.classList.toggle('show');
            toggler.classList.toggle('active');
            toggler.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        // Close menu on clicking any nav-link or CTA inside collapse
        collapse.querySelectorAll('.nav-link, .btn-whatsapp-nav').forEach(link => {
            link.addEventListener('click', () => {
                collapse.classList.remove('show');
                toggler.classList.remove('active');
                toggler.setAttribute('aria-expanded', 'false');
            });
        });

        // Close menu on click outside
        document.addEventListener('click', (e) => {
            if (!collapse.contains(e.target) && !toggler.contains(e.target)) {
                collapse.classList.remove('show');
                toggler.classList.remove('active');
                toggler.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // ScrollSpy active link indicator
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        const scrollPosition = window.pageYOffset + 150;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href') || '';
            if (current && (href === '#' + current || href.endsWith('#' + current))) {
                link.classList.add('active');
            }
        });
    });
}

/* ============================================================
   SLIDESHOW (Auto-slide, Prev/Next, Dots, Touch Swipe, Pause on Hover)
   ============================================================ */
function initSlideshow() {
    const slideshow = document.getElementById('mainSlideshow');
    if (!slideshow) return;

    const slides = slideshow.querySelectorAll('.slide');
    const dots = slideshow.querySelectorAll('.dot');
    const prevBtn = slideshow.querySelector('.slide-prev');
    const nextBtn = slideshow.querySelector('.slide-next');

    if (slides.length <= 1) return;

    let currentIndex = 0;
    let timer = null;
    const intervalTime = 5000;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function goToSlide(index) {
        slides[currentIndex].classList.remove('active');
        slides[currentIndex].setAttribute('aria-hidden', 'true');
        if (dots[currentIndex]) dots[currentIndex].classList.remove('active');

        currentIndex = (index + slides.length) % slides.length;

        slides[currentIndex].classList.add('active');
        slides[currentIndex].setAttribute('aria-hidden', 'false');
        if (dots[currentIndex]) dots[currentIndex].classList.add('active');
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    function startAutoSlide() {
        if (prefersReducedMotion) return;
        stopAutoSlide();
        timer = setInterval(nextSlide, intervalTime);
    }

    function stopAutoSlide() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    // Buttons
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            startAutoSlide();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            startAutoSlide();
        });
    }

    // Dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            goToSlide(index);
            startAutoSlide();
        });
    });

    // Pause on hover
    slideshow.addEventListener('mouseenter', stopAutoSlide);
    slideshow.addEventListener('mouseleave', startAutoSlide);

    // Mobile Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;

    slideshow.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoSlide();
    }, { passive: true });

    slideshow.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoSlide();
    }, { passive: true });

    function handleSwipe() {
        const threshold = 50;
        const diff = touchEndX - touchStartX;
        if (diff > threshold) {
            prevSlide();
        } else if (diff < -threshold) {
            nextSlide();
        }
    }

    // Start auto slide
    startAutoSlide();
}

/* ============================================================
   LIGHTBOX FOR GALLERY
   ============================================================ */
function initLightbox() {
    const lightbox = document.getElementById('lightbox');
    if (!lightbox) return;

    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const closeBtn = document.getElementById('lightboxClose');
    const prevBtn = document.getElementById('lightboxPrev');
    const nextBtn = document.getElementById('lightboxNext');
    const galleryItems = document.querySelectorAll('.gallery-item[data-src]');

    if (!galleryItems.length) return;

    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        const item = galleryItems[currentIndex];
        const src = item.getAttribute('data-src');
        const title = item.getAttribute('data-title') || '';

        lightboxImg.src = src;
        lightboxCaption.textContent = title;
        lightbox.classList.add('active');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImg.src = '';
        lightboxCaption.textContent = '';
        document.body.style.overflow = '';
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % galleryItems.length;
        openLightbox(currentIndex);
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        openLightbox(currentIndex);
    }

    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => openLightbox(index));
    });

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (nextBtn) nextBtn.addEventListener('click', showNext);
    if (prevBtn) prevBtn.addEventListener('click', showPrev);

    // Click backdrop to close
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') showNext();
        if (e.key === 'ArrowLeft') showPrev();
    });
}

/* ============================================================
   SMOOTH SCROLL (Navbar Offset)
   ============================================================ */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const navHeight = document.getElementById('navbar')?.offsetHeight || 70;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - navHeight;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/* ============================================================
   INTERACTIVE CHAT BOT & WHATSAPP INTEGRATION
   ============================================================ */
function initChatbot() {
    const container = document.getElementById('chatbotContainer');
    if (!container) return;

    const floatingBtn = document.getElementById('floatingWaBtn');
    const chatWindow = document.getElementById('chatbotWindow');
    const closeBtn = document.getElementById('chatbotCloseBtn');
    const chatBody = document.getElementById('chatbotBody');
    const quickReplies = document.getElementById('quickReplies');
    const phone = container.getAttribute('data-phone') || '6281234567890';

    if (floatingBtn && chatWindow) {
        floatingBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            chatWindow.classList.toggle('show');
            const badge = floatingBtn.querySelector('.wa-btn-badge');
            if (badge) badge.style.display = 'none';
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                chatWindow.classList.remove('show');
            });
        }

        // Close on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && chatWindow.classList.contains('show')) {
                chatWindow.classList.remove('show');
            }
        });
    }

    // Quick replies logic
    if (quickReplies) {
        quickReplies.querySelectorAll('.quick-reply-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const action = btn.getAttribute('data-reply');
                handleBotAction(action, phone, chatBody);
            });
        });
    }
}

function getCurrentTime() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');
    return `${h}:${m}`;
}

function appendUserBubble(text, chatBody) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'chat-message user-message';
    msgDiv.innerHTML = `
        <div class="chat-bubble">
            <p>${text}</p>
        </div>
        <span class="chat-time">${getCurrentTime()}</span>
    `;
    chatBody.appendChild(msgDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

function appendBotBubble(htmlContent, chatBody) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'chat-message bot-message';
    msgDiv.innerHTML = `
        <div class="chat-bubble">
            ${htmlContent}
        </div>
        <span class="chat-time">${getCurrentTime()}</span>
    `;
    chatBody.appendChild(msgDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

function handleBotAction(action, phone, chatBody) {
    if (action === 'tarif') {
        appendUserBubble('Berapa tarif cuci dan bagaimana cara tukar koin?', chatBody);
        setTimeout(() => {
            const reply = `
                <p>Tarif cuci koin di IKKY LAUNDRYIN COIN <strong>Mulai dari Rp5.000 per kali cuci</strong>! 🪙</p>
                <p style="margin-top: 6px;">Di outlet kami sudah tersedia <strong>mesin penukar uang ke koin secara otomatis</strong>. Cukup masukkan uang kertas, koin langsung keluar dan siap digunakan!</p>
                <a href="https://wa.me/${phone}?text=${encodeURIComponent('Halo IKKY LAUNDRYIN, saya mau tanya detail tarif dan penukaran koin.')}" target="_blank" rel="noopener noreferrer" class="chat-cta-wa">
                    <i class="fab fa-whatsapp"></i> Chat WhatsApp
                </a>
            `;
            appendBotBubble(reply, chatBody);
        }, 350);
    } else if (action === 'layanan') {
        appendUserBubble('Apa saja layanan mesin cuci dan pengering yang tersedia?', chatBody);
        setTimeout(() => {
            const reply = `
                <p>Tersedia 2 layanan mesin komersial:</p>
                <p style="margin-top: 4px;">🧺 <strong>Mesin Cuci (Washer):</strong> Drum besar, 1 mesin khusus untuk cucianmu sendiri (tidak dicampur!).</p>
                <p style="margin-top: 4px;">☀️ <strong>Mesin Pengering (Dryer):</strong> Kering 100% tuntas siap lipat, anti bau apek saat musim hujan!</p>
                <a href="https://wa.me/${phone}?text=${encodeURIComponent('Halo IKKY LAUNDRYIN, saya mau tanya kapasitas mesin cuci dan pengering.')}" target="_blank" rel="noopener noreferrer" class="chat-cta-wa">
                    <i class="fab fa-whatsapp"></i> Tanya Spesifikasi via WA
                </a>
            `;
            appendBotBubble(reply, chatBody);
        }, 350);
    } else if (action === 'lokasi') {
        appendUserBubble('Di mana lokasi outlet dan jam buka operasionalnya?', chatBody);
        setTimeout(() => {
            const reply = `
                <p>📍 <strong>Alamat Outlet:</strong><br>Jl. Utama Laundry No. 88 (Dekat Area Kampus &amp; Pemukiman Warga). Akses jalan mudah &amp; parkir aman!</p>
                <p style="margin-top: 6px;">⏰ <strong>Jam Operasional:</strong><br>Buka Setiap Hari: <strong>06.00 – 22.00 WIB</strong><br><span style="color:#16a34a; font-weight:600;">✓ Tetap buka di hari libur &amp; tanggal merah</span></p>
                <a href="#kontak" class="chat-cta-wa" onclick="document.getElementById('chatbotWindow')?.classList.remove('show');">
                    <i class="fas fa-map-marker-alt"></i> Lihat Peta Lokasi
                </a>
            `;
            appendBotBubble(reply, chatBody);
        }, 350);
    } else if (action === 'wa_direct') {
        appendUserBubble('Saya ingin hubungi pemilik / CS langsung via WhatsApp.', chatBody);
        setTimeout(() => {
            const reply = `
                <p>Siap! Kamu akan langsung diarahkan ke chat WhatsApp resmi dengan pemilik/pengelola outlet kami. 💬</p>
                <a href="https://wa.me/${phone}?text=${encodeURIComponent('Halo Pemilik IKKY LAUNDRYIN COIN, saya ingin bertanya langsung seputar layanan laundry koin.')}" target="_blank" rel="noopener noreferrer" class="chat-cta-wa">
                    <i class="fab fa-whatsapp"></i> Buka Chat WhatsApp Sekarang
                </a>
            `;
            appendBotBubble(reply, chatBody);
            // Open window automatically
            window.open(`https://wa.me/${phone}?text=${encodeURIComponent('Halo Pemilik IKKY LAUNDRYIN COIN, saya ingin bertanya langsung seputar layanan laundry koin.')}`, '_blank');
        }, 350);
    }
}

function sendCustomChat() {
    const container = document.getElementById('chatbotContainer');
    const input = document.getElementById('chatInputText');
    const chatBody = document.getElementById('chatbotBody');
    if (!input || !chatBody) return;

    const text = input.value.trim();
    if (!text) return;

    const phone = container ? (container.getAttribute('data-phone') || '6281234567890') : '6281234567890';

    appendUserBubble(text, chatBody);
    input.value = '';

    setTimeout(() => {
        const reply = `
            <p>Terima kasih atas pertanyaanmu! 🙏</p>
            <p style="margin-top: 4px;">Pesanmu: <em>"${text}"</em></p>
            <p style="margin-top: 6px;">Klik tombol di bawah untuk langsung meneruskan pertanyaan ini ke WhatsApp pemilik / staf kami:</p>
            <a href="https://wa.me/${phone}?text=${encodeURIComponent('Halo IKKY LAUNDRYIN COIN, ' + text)}" target="_blank" rel="noopener noreferrer" class="chat-cta-wa">
                <i class="fab fa-whatsapp"></i> Kirim ke WhatsApp Sekarang
            </a>
        `;
        appendBotBubble(reply, chatBody);

        // Open WA
        window.open(`https://wa.me/${phone}?text=${encodeURIComponent('Halo IKKY LAUNDRYIN COIN, ' + text)}`, '_blank');
    }, 400);
}
