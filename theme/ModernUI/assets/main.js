/**
 * ModernUI Theme - Main JavaScript
 * Author: AI Assistant
 * Version: 1.0.0
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        initNavbar();
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
        initAutoDownloadDetection();
        initDownloadButtonEffects();
    });

    /**
     * Initialize Navbar scroll effects
     */
    function initNavbar() {
        const navbar = document.querySelector('.navbar');
        if (!navbar) return;

        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
                if (navbar.classList.contains('navbar-transparent')) {
                    navbar.classList.remove('navbar-transparent');
                    navbar.classList.add('navbar-blur');
                }
            } else {
                navbar.classList.remove('navbar-scrolled');
                if (window.settings.theme.navbar_style === 'transparent') {
                    navbar.classList.remove('navbar-blur');
                    navbar.classList.add('navbar-transparent');
                }
            }
        });
    }

    /**
     * Initialize Mobile Menu
     */
    function initMobileMenu() {
        const toggle = document.querySelector('.mobile-menu-toggle');
        const menu = document.querySelector('.navbar-menu');
        
        if (!toggle || !menu) return;

        toggle.addEventListener('click', function() {
            menu.classList.toggle('active');
            this.innerHTML = menu.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });

        // Close menu when clicking on a link
        const navLinks = menu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                menu.classList.remove('active');
                toggle.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });
    }

    /**
     * Initialize Smooth Scrolling
     */
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    const navbarHeight = document.querySelector('.navbar')?.offsetHeight || 0;
                    const targetPosition = target.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Initialize Scroll Animations
     */
    function initScrollAnimations() {
        if (window.settings.theme.enable_animations === false) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in-view');
                }
            });
        }, observerOptions);

        // Observe all cards and sections
        const elements = document.querySelectorAll('.feature-card, .download-card, .pricing-card');
        elements.forEach(el => observer.observe(el));
    }

    /**
     * Auto-detect platform for downloads
     */
    function initAutoDownloadDetection() {
        const autoDetectBtn = document.querySelector('.btn-auto-detect');
        if (!autoDetectBtn) return;

        autoDetectBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const platform = detectPlatform();
            const platformCard = findPlatformCard(platform);
            
            if (platformCard) {
                // Highlight the detected platform
                highlightPlatform(platformCard);
                
                // Show notification
                showNotification(`检测到您的设备: ${platform}`, 'success');
                
                // Scroll to the card
                platformCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                showNotification('无法检测到您的平台，请手动选择', 'info');
            }
        });
    }

    /**
     * Detect user's platform
     */
    function detectPlatform() {
        const userAgent = navigator.userAgent.toLowerCase();
        const platform = navigator.platform.toLowerCase();
        
        if (/iphone|ipad|ipod/.test(userAgent)) {
            return 'iOS';
        } else if (/android/.test(userAgent)) {
            return 'Android';
        } else if (/mac/.test(platform)) {
            return 'macOS';
        } else if (/win/.test(platform)) {
            return 'Windows';
        } else if (/linux/.test(platform)) {
            return 'Linux';
        }
        
        return 'Unknown';
    }

    /**
     * Find platform card by name
     */
    function findPlatformCard(platformName) {
        const cards = document.querySelectorAll('.download-card');
        
        for (let card of cards) {
            const title = card.querySelector('h3');
            if (title && title.textContent.includes(platformName)) {
                return card;
            }
        }
        
        return null;
    }

    /**
     * Highlight a platform card
     */
    function highlightPlatform(card) {
        // Remove previous highlights
        document.querySelectorAll('.download-card.highlighted').forEach(c => {
            c.classList.remove('highlighted');
        });
        
        // Add highlight to selected card
        card.classList.add('highlighted');
        
        // Add pulsing effect
        card.style.animation = 'pulse 0.5s ease-in-out 3';
        
        setTimeout(() => {
            card.style.animation = '';
        }, 1500);
    }

    /**
     * Show notification
     */
    function showNotification(message, type = 'info') {
        // Remove existing notification
        const existing = document.querySelector('.notification');
        if (existing) existing.remove();
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        // Add styles
        Object.assign(notification.style, {
            position: 'fixed',
            top: '100px',
            right: '20px',
            backgroundColor: type === 'success' ? '#10B981' : '#3B82F6',
            color: 'white',
            padding: '1rem 1.5rem',
            borderRadius: '0.75rem',
            boxShadow: '0 10px 25px rgba(0,0,0,0.2)',
            display: 'flex',
            alignItems: 'center',
            gap: '0.75rem',
            zIndex: '9999',
            animation: 'slideInRight 0.3s ease-out',
            fontSize: '1rem',
            fontWeight: '500'
        });
        
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    /**
     * Initialize download button effects
     */
    function initDownloadButtonEffects() {
        const downloadButtons = document.querySelectorAll('.btn-download, .btn-platform-download');
        
        downloadButtons.forEach(button => {
            // Add ripple effect
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.className = 'ripple';
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
            
            // Add magnetic effect for large buttons
            if (button.classList.contains('btn-download-large')) {
                button.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) scale(1.05)`;
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            }
        });
    }

    /**
     * Add CSS animations dynamically
     */
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .download-card.highlighted {
            border: 3px solid #FFD700 !important;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.5) !important;
        }
        
        .animate-in-view {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        @media (max-width: 768px) {
            .navbar-menu.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 1rem;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                animation: slideDown 0.3s ease-out;
            }
            
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }
    `;
    document.head.appendChild(style);

})();
