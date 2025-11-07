<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-6">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="<?php echo SITE_URL; ?>/index.php" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-xl">H</span>
                </div>
                <span id="logo-text" class="text-2xl font-bold text-white">HashCodeLab</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link font-medium hover:text-blue-600 transition-colors text-white">
                    Home
                </a>
                <a href="<?php echo SITE_URL; ?>/about.php" class="nav-link font-medium hover:text-blue-600 transition-colors text-white">
                    About
                </a>
                
                <!-- Services Dropdown -->
                <div class="relative group">
                    <button class="nav-link font-medium hover:text-blue-600 transition-colors flex items-center gap-1 text-white">
                        Services 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="w-64 bg-white rounded-lg shadow-xl py-2">
                            <a href="<?php echo SITE_URL; ?>/services.php?service=web-design" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Web Design & Development</a>
                            <a href="<?php echo SITE_URL; ?>/services.php?service=app-development" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">App Development</a>
                            <a href="<?php echo SITE_URL; ?>/services.php?service=web-applications" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Web Applications</a>
                            <a href="<?php echo SITE_URL; ?>/services.php?service=graphic-design" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Graphic Design</a>
                            <a href="<?php echo SITE_URL; ?>/services.php?service=seo-marketing" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">SEO & Digital Marketing</a>
                            <a href="<?php echo SITE_URL; ?>/services.php?service=ai-solutions" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">AI Solutions</a>
                        </div>
                    </div>
                </div>

                <a href="<?php echo SITE_URL; ?>/portfolio.php" class="nav-link font-medium hover:text-blue-600 transition-colors text-white">
                    Portfolio
                </a>
                <a href="<?php echo SITE_URL; ?>/blog.php" class="nav-link font-medium hover:text-blue-600 transition-colors text-white">
                    Blog
                </a>
                <a href="<?php echo SITE_URL; ?>/careers.php" class="nav-link font-medium hover:text-blue-600 transition-colors text-white">
                    Careers
                </a>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Contact Us
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-white">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-4 bg-white rounded-lg p-4 shadow-lg">
                <a href="<?php echo SITE_URL; ?>/index.php" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="<?php echo SITE_URL; ?>/about.php" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                <div>
                    <button id="mobile-services-btn" class="text-gray-700 hover:text-blue-600 font-medium flex items-center gap-1 w-full">
                        Services 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div id="mobile-services-menu" class="hidden ml-4 mt-2 space-y-2">
                        <a href="<?php echo SITE_URL; ?>/services.php?service=web-design" class="block text-gray-600 hover:text-blue-600">Web Design & Development</a>
                        <a href="<?php echo SITE_URL; ?>/services.php?service=app-development" class="block text-gray-600 hover:text-blue-600">App Development</a>
                        <a href="<?php echo SITE_URL; ?>/services.php?service=web-applications" class="block text-gray-600 hover:text-blue-600">Web Applications</a>
                        <a href="<?php echo SITE_URL; ?>/services.php?service=graphic-design" class="block text-gray-600 hover:text-blue-600">Graphic Design</a>
                        <a href="<?php echo SITE_URL; ?>/services.php?service=seo-marketing" class="block text-gray-600 hover:text-blue-600">SEO & Marketing</a>
                        <a href="<?php echo SITE_URL; ?>/services.php?service=ai-solutions" class="block text-gray-600 hover:text-blue-600">AI Solutions</a>
                    </div>
                </div>
                <a href="<?php echo SITE_URL; ?>/portfolio.php" class="text-gray-700 hover:text-blue-600 font-medium">Portfolio</a>
                <a href="<?php echo SITE_URL; ?>/blog.php" class="text-gray-700 hover:text-blue-600 font-medium">Blog</a>
                <a href="<?php echo SITE_URL; ?>/careers.php" class="text-gray-700 hover:text-blue-600 font-medium">Careers</a>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-center transition-colors">Contact Us</a>
            </div>
        </div>
    </div>
</nav>

<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const logoText = document.getElementById('logo-text');
    const navLinks = document.querySelectorAll('.nav-link');
    
    if (window.scrollY > 20) {
        navbar.classList.remove('bg-transparent', 'py-6');
        navbar.classList.add('bg-white', 'shadow-md', 'py-4');
        logoText.classList.remove('text-white');
        logoText.classList.add('text-gray-900');
        navLinks.forEach(link => {
            link.classList.remove('text-white');
            link.classList.add('text-gray-700');
        });
    } else {
        navbar.classList.remove('bg-white', 'shadow-md', 'py-4');
        navbar.classList.add('bg-transparent', 'py-6');
        logoText.classList.remove('text-gray-900');
        logoText.classList.add('text-white');
        navLinks.forEach(link => {
            link.classList.remove('text-gray-700');
            link.classList.add('text-white');
        });
    }
});

// Mobile menu toggle
document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
});

// Mobile services toggle
const mobileServicesBtn = document.getElementById('mobile-services-btn');
if (mobileServicesBtn) {
    mobileServicesBtn.addEventListener('click', function() {
        const menu = document.getElementById('mobile-services-menu');
        menu.classList.toggle('hidden');
    });
}
</script>
