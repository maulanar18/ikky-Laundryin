@php
    $rawWa = $profile->whatsapp_number ?? '6281234567890';
    $cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
    if (!str_starts_with($cleanWa, '62') && str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
    $defaultWaUrl = 'https://wa.me/' . $cleanWa . '?text=' . urlencode('Halo IKKY LAUNDRYIN COIN, saya mau tanya tentang layanan laundry koin.');
@endphp

<!-- ============================================================
     FLOATING WHATSAPP & INTERACTIVE CHAT BOT
     ============================================================ -->
<div class="chatbot-container" id="chatbotContainer" data-phone="{{ $cleanWa }}">
    <!-- Chat Window -->
    <div class="chatbot-window" id="chatbotWindow" aria-hidden="true">
        <!-- Header -->
        <div class="chatbot-header">
            <div class="chatbot-header-info">
                <div class="chatbot-avatar">
                    <i class="fas fa-tshirt"></i>
                    <span class="online-indicator"></span>
                </div>
                <div>
                    <h4 class="chatbot-name">IKKY Assistant</h4>
                    <span class="chatbot-status">🟢 Online | Siap Membantu</span>
                </div>
            </div>
            <button type="button" class="chatbot-close-btn" id="chatbotCloseBtn" aria-label="Tutup Chat">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div class="chatbot-body" id="chatbotBody">
            <div class="chat-time-divider">
                <span>Hari Ini</span>
            </div>

            <!-- Bot Greeting -->
            <div class="chat-message bot-message">
                <div class="chat-bubble">
                    <p>Halo! Selamat datang di <strong>IKKY LAUNDRYIN COIN</strong>! 🧺✨</p>
                    <p>Ada yang bisa kami bantu seputar cuci koin &amp; pengering pakaian hari ini?</p>
                </div>
                <span class="chat-time">{{ date('H:i') }}</span>
            </div>

            <!-- Quick Action Options -->
            <div class="chat-quick-replies" id="quickReplies">
                <button type="button" class="quick-reply-btn" data-reply="tarif">
                    🪙 Tanya Tarif &amp; Koin
                </button>
                <button type="button" class="quick-reply-btn" data-reply="layanan">
                    🧺 Mesin Cuci &amp; Pengering
                </button>
                <button type="button" class="quick-reply-btn" data-reply="lokasi">
                    📍 Alamat &amp; Jam Buka
                </button>
                <button type="button" class="quick-reply-btn" data-reply="wa_direct">
                    💬 Hubungi Langsung via WA
                </button>
            </div>
        </div>

        <!-- Chat Input Footer -->
        <div class="chatbot-footer">
            <form id="chatbotForm" class="chatbot-input-row" onsubmit="event.preventDefault(); sendCustomChat();">
                <input type="text" id="chatInputText" class="chat-input-field" placeholder="Ketik pertanyaan untuk CS / Pemilik..." autocomplete="off">
                <button type="submit" class="chat-send-btn" id="chatSendBtn" title="Kirim ke WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </button>
            </form>
            <div class="chatbot-disclaimer">
                <span><i class="fas fa-shield-alt"></i> Pesan terhubung langsung ke WhatsApp resmi outlet</span>
            </div>
        </div>
    </div>

    <!-- Floating Trigger Button -->
    <button type="button" class="floating-wa-btn" id="floatingWaBtn" aria-label="Buka Chat WhatsApp">
        <span class="wa-btn-pulse"></span>
        <div class="wa-btn-icon">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div class="wa-btn-label">
            <span class="wa-label-top">Tanya CS / Order</span>
            <span class="wa-label-bottom">Chat WhatsApp</span>
        </div>
        <span class="wa-btn-badge">1</span>
    </button>
</div>
