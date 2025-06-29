<style>
    .floating-buttons {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .scroll-to-top {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        background-color: #2563eb; 
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25);
        transition: background-color 0.3s ease;
    }

    .scroll-to-top:hover {
        background-color: #1d4ed8; 
    }

    .scroll-to-top svg {
        width: 22px;
        height: 22px;
        stroke: white;
        stroke-width: 2.5;
        fill: none;
    }

    .whatsapp-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #25d366;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25);
    }

    .whatsapp-btn img {
        width: 28px;
        height: 28px;
    }
</style>

<div class="floating-buttons">
    <button class="scroll-to-top" onclick="scrollToTop()" title="Kembali ke atas">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <polyline points="18 15 12 9 6 15" />
        </svg>
    </button>

    <a href="https://wa.me/6285693801996" target="_blank" class="whatsapp-btn" title="Chat WhatsApp">
        <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp">
    </a>
</div>

<script>
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
