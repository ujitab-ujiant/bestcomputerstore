document.addEventListener('DOMContentLoaded', function() {
    initializeSidebar();
});

function initializeSidebar() {
    const mobileToggle = document.querySelector('.mobile-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }

    document.addEventListener('click', function(event) {
        const toggleButton = document.querySelector('.mobile-toggle');
        
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && window.innerWidth <= 768) {
            sidebar.classList.remove('active');
        }
    });
}

