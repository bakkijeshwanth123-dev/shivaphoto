// Navbar scroll effect
window.addEventListener('scroll', function () {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

// Smooth scroll for nav links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Animation on scroll (Simple Reveal)
const revealElements = document.querySelectorAll('.section-title, .scroll-container iframe, .booking-container');
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

revealElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'all 0.6s ease-out';
    revealObserver.observe(el);
});

// Razorpay Placeholder Function
function payNow() {
    alert("Razorpay Integration: In a real environment, this would open the payment modal. Please configure your API keys in the backend logic.");
}

// Handle Query Params for alerts (Simplified)
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('error')) {
    alert("An error occurred: " + urlParams.get('error'));
}
if (urlParams.has('registered')) {
    alert("Registration successful! Please login.");
}
