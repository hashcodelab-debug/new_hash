<footer class="bg-gray-900 text-gray-300">
    <!-- Main Footer -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">H</span>
                    </div>
                    <span class="text-2xl font-bold text-white">HashCodeLab</span>
                </div>
                <p class="text-sm mb-4">
                    Professional IT services company offering comprehensive technology solutions for businesses worldwide.
                </p>
                <div class="flex space-x-4">
                    <a href="https://facebook.com" target="_blank" class="hover:text-blue-500 transition-colors">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="hover:text-blue-400 transition-colors">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="hover:text-blue-600 transition-colors">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="hover:text-pink-500 transition-colors">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="<?php echo SITE_URL; ?>/index.php" class="hover:text-blue-500 transition-colors text-sm">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/about.php" class="hover:text-blue-500 transition-colors text-sm">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/portfolio.php" class="hover:text-blue-500 transition-colors text-sm">Portfolio</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/blog.php" class="hover:text-blue-500 transition-colors text-sm">Blog</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/careers.php" class="hover:text-blue-500 transition-colors text-sm">Careers</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/contact.php" class="hover:text-blue-500 transition-colors text-sm">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="<?php echo SITE_URL; ?>/services.php?service=web-design" class="hover:text-blue-500 transition-colors text-sm">Web Design</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services.php?service=app-development" class="hover:text-blue-500 transition-colors text-sm">App Development</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services.php?service=graphic-design" class="hover:text-blue-500 transition-colors text-sm">Graphic Design</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services.php?service=seo-marketing" class="hover:text-blue-500 transition-colors text-sm">SEO & Marketing</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services.php?service=ai-solutions" class="hover:text-blue-500 transition-colors text-sm">AI Solutions</a></li>
                </ul>
            </div>

            <!-- Newsletter & Contact -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4">Newsletter</h3>
                <p class="text-sm mb-4">Subscribe to get latest updates and news.</p>
                <form id="newsletter-form" class="space-y-2">
                    <input type="email" id="newsletter-email" placeholder="Your email" required class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-blue-500">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors flex items-center justify-center">
                        Subscribe 
                        <i data-lucide="send" class="w-4 h-4 ml-2"></i>
                    </button>
                </form>
                <div class="mt-6 space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <i data-lucide="mail" class="w-4 h-4 text-blue-500"></i>
                        <span>info@hashcodelab.com</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i data-lucide="phone" class="w-4 h-4 text-blue-500"></i>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i data-lucide="map-pin" class="w-4 h-4 text-blue-500"></i>
                        <span>123 Tech Street, Silicon Valley</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-400">
                    &copy; <?php echo date('Y'); ?> HashCodeLab. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="<?php echo SITE_URL; ?>/privacy-policy.php" class="text-sm text-gray-400 hover:text-blue-500 transition-colors">Privacy Policy</a>
                    <a href="<?php echo SITE_URL; ?>/terms.php" class="text-sm text-gray-400 hover:text-blue-500 transition-colors">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Button -->
<a href="https://wa.me/15551234567" target="_blank" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg transition-all z-40">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
</a>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="hidden fixed bottom-6 left-6 bg-blue-600 hover:bg-blue-700 text-white rounded-full p-3 shadow-lg transition-all z-40">
    <i data-lucide="arrow-up" class="w-5 h-5"></i>
</button>

<!-- Cookie Consent Banner -->
<div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-sm">
            We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies. 
            <a href="<?php echo SITE_URL; ?>/privacy-policy.php" class="text-blue-400 hover:underline">Learn more</a>
        </p>
        <button id="accept-cookies" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg text-sm whitespace-nowrap transition-colors">
            Accept
        </button>
    </div>
</div>

<!-- Custom JavaScript -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Newsletter form
    document.getElementById('newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('newsletter-email').value;
        alert('Thank you for subscribing! We\'ll send updates to ' + email);
        this.reset();
    });
    
    // Scroll to top button
    const scrollBtn = document.getElementById('scroll-to-top');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove('hidden');
        } else {
            scrollBtn.classList.add('hidden');
        }
    });
    
    scrollBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Cookie consent
    const cookieBanner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('accept-cookies');
    
    if (!localStorage.getItem('cookies-accepted')) {
        cookieBanner.style.display = 'block';
    } else {
        cookieBanner.style.display = 'none';
    }
    
    acceptBtn.addEventListener('click', function() {
        localStorage.setItem('cookies-accepted', 'true');
        cookieBanner.style.display = 'none';
    });
</script>

</body>
</html>
