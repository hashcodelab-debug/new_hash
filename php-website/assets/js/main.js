/**
 * HashCodeLab Main JavaScript
 */

// Utility Functions
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type} fixed top-20 right-4 z-50 shadow-lg max-w-md animate-fade-in`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

function showLoading(show = true) {
    const loadingEl = document.getElementById('loading-spinner');
    if (loadingEl) {
        loadingEl.style.display = show ? 'flex' : 'none';
    }
}

// Smooth scroll to element
function scrollToElement(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

// Form validation helper
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[\d\s\-\+\(\)]+$/;
    return re.test(phone) && phone.replace(/\D/g, '').length >= 10;
}

// Lazy load images
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initialize lazy loading
    lazyLoadImages();
    
    // Add animation to elements on scroll
    const animateOnScroll = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        },
        { threshold: 0.1 }
    );
    
    animateOnScroll.forEach(el => observer.observe(el));
    
    // External links open in new tab
    document.querySelectorAll('a[href^="http"]').forEach(link => {
        if (!link.href.includes(window.location.hostname)) {
            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        }
    });
});

// Global error handler
window.addEventListener('error', function(e) {
    console.error('Error:', e.message);
});
