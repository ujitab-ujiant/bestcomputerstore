function togglePasswordVisibility(inputId, iconElement) {
    const input = document.getElementById(inputId);
    const icon = iconElement.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function showPasswordModalOnError() {
    const modal = document.getElementById('changePasswordModal');
    if (modal) {
        new bootstrap.Modal(modal).show();
    }
}

function initializeStatsCardAnimations() {
    const statsCards = document.querySelectorAll('.stats-card');
    statsCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.style.animation = 'fadeInUp 0.6s ease forwards';
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initializeStatsCardAnimations();
    
    window.togglePasswordVisibility = togglePasswordVisibility;
    window.showPasswordModalOnError = showPasswordModalOnError;
});