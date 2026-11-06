/**
 * IKKY LAUNDRYIN COIN - Main Vanilla JavaScript
 * Features:
 * - Responsive Navbar & Mobile Drawer
 * - Vanilla Slideshow with Auto-play, Swipe, Pause-on-hover & Accessibility
 * - Vanilla Lightbox with Keyboard & Touch navigation
 * - Scrollspy & Sticky Header
 * - Image Fallback Handlers
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* ==========================================================================
     1. STICKY NAVBAR & SCROLLSPY
     ========================================================================== */
  const header = document.querySelector('.site-header');
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

  const handleScroll = () => {
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;

    // Sticky header shadow
    if (header) {
      if (scrollY > 30) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    }

    // Scrollspy: update active nav item based on viewport position
    const scrollPosition = scrollY + 140;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute('id');

      if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          if (link.getAttribute('href') === `#${sectionId}`) {
            link.classList.add('active');
          } else {
            link.classList.remove('active');
          }
        });
      }
    });
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  /* ==========================================================================
     2. MOBILE MENU DRAWER & HAMBURGER
     ========================================================================== */
  const navToggle = document.getElementById('navToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const navOverlay = document.getElementById('navOverlay');
  const mobileCloseBtn = document.getElementById('mobileCloseBtn');

  const openMobileMenu = () => {
    if (!mobileDrawer || !navToggle) return;
    navToggle.classList.add('is-active');
    mobileDrawer.classList.add('is-open');
    if (navOverlay) navOverlay.classList.add('is-visible');
    navToggle.setAttribute('aria-expanded', 'true');
    mobileDrawer.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };

  const closeMobileMenu = () => {
    if (!mobileDrawer || !navToggle) return;
    navToggle.classList.remove('is-active');
    mobileDrawer.classList.remove('is-open');
    if (navOverlay) navOverlay.classList.remove('is-visible');
    navToggle.setAttribute('aria-expanded', 'false');
    mobileDrawer.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  if (navToggle) {
    navToggle.addEventListener('click', () => {
      const isOpen = mobileDrawer && mobileDrawer.classList.contains('is-open');
      if (isOpen) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });
  }

  if (mobileCloseBtn) {
    mobileCloseBtn.addEventListener('click', closeMobileMenu);
  }

  if (navOverlay) {
    navOverlay.addEventListener('click', closeMobileMenu);
  }

  // Close mobile menu when any nav link inside is clicked
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
  mobileNavLinks.forEach((link) => {
    link.addEventListener('click', closeMobileMenu);
  });

  // Smooth scroll for all internal anchor links with offset adjustment
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#' || !targetId) return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerHeight = header ? header.offsetHeight : 80;
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  /* ==========================================================================
     3. SLIDESHOW (VANILLA JS)
     ========================================================================== */
  const slideshow = document.getElementById('mainSlideshow');
  if (slideshow) {
    const slides = slideshow.querySelectorAll('.slide-item');
    const dotsContainer = document.getElementById('slideshowDots');
    const prevBtn = document.getElementById('slideshowPrev');
    const nextBtn = document.getElementById('slideshowNext');
    let currentSlide = 0;
    let slideInterval = null;
    const slideDuration = 5000; // 5 seconds
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Generate indicators / dots dynamically based on slide count
    if (dotsContainer && slides.length > 0) {
      dotsContainer.innerHTML = '';
      slides.forEach((_, idx) => {
        const dot = document.createElement('button');
        dot.className = `dot-btn ${idx === 0 ? 'is-active' : ''}`;
        dot.setAttribute('type', 'button');
        dot.setAttribute('aria-label', `Pindah ke slide ${idx + 1}`);
        dot.addEventListener('click', () => {
          goToSlide(idx);
          resetInterval();
        });
        dotsContainer.appendChild(dot);
      });
    }

    const dots = dotsContainer ? dotsContainer.querySelectorAll('.dot-btn') : [];

    const showSlide = (index) => {
      if (slides.length === 0) return;
      
      // Normalize index
      if (index >= slides.length) currentSlide = 0;
      else if (index < 0) currentSlide = slides.length - 1;
      else currentSlide = index;

      slides.forEach((slide, i) => {
        if (i === currentSlide) {
          slide.classList.add('is-active');
          slide.setAttribute('aria-hidden', 'false');
        } else {
          slide.classList.remove('is-active');
          slide.setAttribute('aria-hidden', 'true');
        }
      });

      dots.forEach((dot, i) => {
        if (i === currentSlide) {
          dot.classList.add('is-active');
          dot.setAttribute('aria-current', 'true');
        } else {
          dot.classList.remove('is-active');
          dot.removeAttribute('aria-current');
        }
      });
    };

    const nextSlide = () => {
      showSlide(currentSlide + 1);
    };

    const prevSlide = () => {
      showSlide(currentSlide - 1);
    };

    const goToSlide = (idx) => {
      showSlide(idx);
    };

    // Auto-advance timer
    const startInterval = () => {
      if (prefersReducedMotion) return; // Respect user reduced motion preference
      stopInterval();
      slideInterval = setInterval(nextSlide, slideDuration);
    };

    const stopInterval = () => {
      if (slideInterval) {
        clearInterval(slideInterval);
        slideInterval = null;
      }
    };

    const resetInterval = () => {
      stopInterval();
      startInterval();
    };

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        prevSlide();
        resetInterval();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        nextSlide();
        resetInterval();
      });
    }

    // Pause on hover
    slideshow.addEventListener('pointerenter', stopInterval);
    slideshow.addEventListener('pointerleave', startInterval);

    // Pause when tab is not active
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        stopInterval();
      } else {
        startInterval();
      }
    });

    // Touch swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    const swipeThreshold = 45; // Minimum px to register swipe

    slideshow.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      stopInterval();
    }, { passive: true });

    slideshow.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
      startInterval();
    }, { passive: true });

    const handleSwipe = () => {
      const diff = touchEndX - touchStartX;
      if (Math.abs(diff) > swipeThreshold) {
        if (diff < 0) {
          // Swiped left -> Next slide
          nextSlide();
        } else {
          // Swiped right -> Previous slide
          prevSlide();
        }
      }
    };

    // Start slideshow
    showSlide(0);
    startInterval();
  }

  /* ==========================================================================
     4. LIGHTBOX GALERI (VANILLA JS)
     ========================================================================== */
  const lightbox = document.getElementById('galleryLightbox');
  const galleryCards = document.querySelectorAll('.gallery-card');

  if (lightbox && galleryCards.length > 0) {
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const lightboxCategory = document.getElementById('lightboxCategory');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');

    let currentGalleryIndex = 0;
    const galleryItems = Array.from(galleryCards).map((card) => {
      const img = card.querySelector('img');
      const titleEl = card.querySelector('.gallery-card-title');
      const catEl = card.querySelector('.gallery-card-category');

      return {
        src: card.getAttribute('data-full-img') || (img ? img.getAttribute('src') : ''),
        alt: img ? img.getAttribute('alt') : 'Foto Galeri Laundry',
        title: titleEl ? titleEl.textContent.trim() : 'Galeri IKKY LAUNDRYIN COIN',
        category: catEl ? catEl.textContent.trim() : 'Fasilitas'
      };
    });

    const updateLightboxContent = (index) => {
      if (index >= galleryItems.length) currentGalleryIndex = 0;
      else if (index < 0) currentGalleryIndex = galleryItems.length - 1;
      else currentGalleryIndex = index;

      const item = galleryItems[currentGalleryIndex];
      if (item && lightboxImg) {
        lightboxImg.src = item.src;
        lightboxImg.alt = item.alt;
        if (lightboxTitle) lightboxTitle.textContent = item.title;
        if (lightboxCategory) lightboxCategory.textContent = item.category;
      }
    };

    const openLightbox = (index) => {
      updateLightboxContent(index);
      lightbox.classList.add('is-open');
      lightbox.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      if (lightboxClose) lightboxClose.focus();
    };

    const closeLightbox = () => {
      lightbox.classList.remove('is-open');
      lightbox.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      if (lightboxImg) lightboxImg.src = '';
    };

    const prevLightboxImg = () => {
      updateLightboxContent(currentGalleryIndex - 1);
    };

    const nextLightboxImg = () => {
      updateLightboxContent(currentGalleryIndex + 1);
    };

    // Attach click events to gallery items
    galleryCards.forEach((card, index) => {
      card.addEventListener('click', () => {
        openLightbox(index);
      });

      // Keyboard accessibility: Enter or Space opens lightbox
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openLightbox(index);
        }
      });
    });

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightboxPrev) lightboxPrev.addEventListener('click', prevLightboxImg);
    if (lightboxNext) lightboxNext.addEventListener('click', nextLightboxImg);

    // Close when clicking outside image content
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox || e.target.classList.contains('lightbox-content')) {
        closeLightbox();
      }
    });

    // Keyboard navigation (Escape, ArrowLeft, ArrowRight)
    document.addEventListener('keydown', (e) => {
      // If mobile menu is open and Esc is pressed
      if (e.key === 'Escape' && mobileDrawer && mobileDrawer.classList.contains('is-open')) {
        closeMobileMenu();
        return;
      }

      // If lightbox is open
      if (lightbox.classList.contains('is-open')) {
        if (e.key === 'Escape') {
          closeLightbox();
        } else if (e.key === 'ArrowLeft') {
          prevLightboxImg();
        } else if (e.key === 'ArrowRight') {
          nextLightboxImg();
        }
      }
    });

    // Touch swipe support inside Lightbox
    let lbTouchStartX = 0;
    let lbTouchEndX = 0;

    lightbox.addEventListener('touchstart', (e) => {
      lbTouchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    lightbox.addEventListener('touchend', (e) => {
      lbTouchEndX = e.changedTouches[0].screenX;
      const diff = lbTouchEndX - lbTouchStartX;
      if (Math.abs(diff) > 40) {
        if (diff < 0) {
          nextLightboxImg();
        } else {
          prevLightboxImg();
        }
      }
    }, { passive: true });
  }

  /* ==========================================================================
     5. IMAGE FALLBACK ON ERROR
     ========================================================================== */
  const allImages = document.querySelectorAll('img');
  const fallbackPlaceholder = 'assets/images/placeholder-laundry.svg';

  allImages.forEach((img) => {
    img.addEventListener('error', function () {
      if (!this.getAttribute('data-fallback-applied')) {
        this.setAttribute('data-fallback-applied', 'true');
        this.src = fallbackPlaceholder;
      }
    });
  });

  /* ==========================================================================
     6. LAZY LOADING OBSERVER FOR OFFSCREEN IMAGES
     ========================================================================== */
  if ('loading' in HTMLImageElement.prototype) {
    // Native lazy loading is supported, apply to non-hero images
    document.querySelectorAll('img[data-lazy]').forEach((img) => {
      img.setAttribute('loading', 'lazy');
    });
  }
});
