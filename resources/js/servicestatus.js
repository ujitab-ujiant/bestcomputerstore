document.addEventListener('DOMContentLoaded', function() {
    const serviceCodeInput = document.getElementById('service_code');
    if (serviceCodeInput) {
        serviceCodeInput.focus();
    }

    if (serviceCodeInput) {
        serviceCodeInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    }

    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const code = serviceCodeInput.value.trim();
            const pattern = /^SVC-[A-Z0-9]{6}$/;
            
            if (!pattern.test(code)) {
                e.preventDefault();
                alert('Format kode servis tidak valid. Gunakan format: SVC-ABC123');
                serviceCodeInput.focus();
            }
        });
    }
});