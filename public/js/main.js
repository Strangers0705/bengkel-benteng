/**
 * Main JavaScript file for Bengkel Mobil Beteng Betawi
 */

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Back to Top button
    initBackToTop();
    
    // Initialize animations
    initAnimations();
    
    // Initialize gallery filter
    initGalleryFilter();
    
    // Initialize mobile nav toggle
    initMobileNav();
});

/**
 * Initialize Back to Top button
 */
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (backToTopBtn) {
        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        
        // Scroll to top when clicked
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Initialize animations
 */
function initAnimations() {
    // Service cards animation
    const serviceCards = document.querySelectorAll('.service-card');
    animateOnScroll(serviceCards, 'animate-fade-in-up', 100);
    
    // Feature boxes animation
    const featureBoxes = document.querySelectorAll('.feature-box');
    animateOnScroll(featureBoxes, 'animate-fade-in-up', 100);
    
    // Testimonial cards animation
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    animateOnScroll(testimonialCards, 'animate-fade-in-up', 100);
    
    // Gallery items animation
    const galleryItems = document.querySelectorAll('.gallery-item');
    animateOnScroll(galleryItems, 'animate-fade-in-up', 100);
}

/**
 * Animate elements when they come into view
 */
function animateOnScroll(elements, animationClass, delay = 0) {
    if (!elements.length) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add(animationClass);
                }, delay * index);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    elements.forEach(element => {
        observer.observe(element);
    });
}

/**
 * Initialize gallery filter
 */
function initGalleryFilter() {
    const filterBtns = document.querySelectorAll('.gallery-filter button');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (!filterBtns.length || !galleryItems.length) return;
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                if (filterValue === 'all' || item.classList.contains(filterValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
}

/**
 * Initialize mobile navigation
 */
function initMobileNav() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (!navbarToggler || !navbarCollapse) return;
    
    // Close mobile menu when clicking on a link
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navbarCollapse.classList.contains('show')) {
                navbarToggler.click();
            }
        });
    });
}

/**
 * Appointment form validation
 */
function validateAppointmentForm() {
    const form = document.getElementById('appointmentForm');
    
    if (!form) return true;
    
    let isValid = true;
    
    // Check required fields
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Validate email
    const emailField = form.querySelector('input[type="email"]');
    if (emailField && emailField.value.trim() && !isValidEmail(emailField.value)) {
        emailField.classList.add('is-invalid');
        isValid = false;
    }
    
    // Validate phone
    const phoneField = form.querySelector('input[name="phone"]');
    if (phoneField && phoneField.value.trim() && !isValidPhone(phoneField.value)) {
        phoneField.classList.add('is-invalid');
        isValid = false;
    }
    
    return isValid;
}

/**
 * Validate email format
 */
function isValidEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/**
 * Validate phone format
 */
function isValidPhone(phone) {
    const re = /^[0-9\+\-\(\) ]{8,20}$/;
    return re.test(String(phone));
}