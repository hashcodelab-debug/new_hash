<?php
require_once 'config.php';
require_once 'functions.php';

$page_title = 'HashCodeLab - Professional IT Services Company';
$page_description = 'Transform your business with cutting-edge IT solutions. Web design, app development, AI solutions, and digital marketing services.';

// Fetch data
$projects = getProjects(6);
$testimonials = getTestimonials(3);
$blogPosts = getBlogPosts(3);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white pt-32 pb-20 md:pt-40 md:pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-300 rounded-full filter blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in">
                    Transform Your Business with Cutting-Edge IT Solutions
                </h1>
                <p class="text-base sm:text-lg mb-8 text-blue-100 animate-fade-in">
                    We deliver innovative web design, app development, AI solutions, and digital marketing services to help your business thrive in the digital age.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in">
                    <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center justify-center transition-colors">
                        Get Started 
                        <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                    </a>
                    <a href="<?php echo SITE_URL; ?>/portfolio.php" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center justify-center transition-colors">
                        View Portfolio
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Preview -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 text-gray-900">
                    Leading IT Services Company
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mb-8">
                    HashCodeLab is a professional IT services company dedicated to delivering innovative technology solutions. With over a decade of experience, we help businesses leverage technology to achieve their goals and stay ahead of the competition.
                </p>
                <a href="<?php echo SITE_URL; ?>/about.php" class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-3 rounded-lg font-medium inline-flex items-center justify-center transition-colors">
                    Learn More About Us 
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900">Our Services</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Comprehensive IT solutions tailored to meet your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $services = [
                    [
                        'icon' => 'code',
                        'title' => 'Web Design & Development',
                        'description' => 'Custom website design and development tailored to your business needs.',
                        'slug' => 'web-design'
                    ],
                    [
                        'icon' => 'smartphone',
                        'title' => 'App Development',
                        'description' => 'Native and cross-platform mobile applications for iOS and Android.',
                        'slug' => 'app-development'
                    ],
                    [
                        'icon' => 'globe',
                        'title' => 'Web Applications',
                        'description' => 'Powerful web applications using React, PHP, and WordPress.',
                        'slug' => 'web-applications'
                    ],
                    [
                        'icon' => 'palette',
                        'title' => 'Graphic Design',
                        'description' => 'Professional logo design, branding, and printable materials.',
                        'slug' => 'graphic-design'
                    ],
                    [
                        'icon' => 'trending-up',
                        'title' => 'SEO & Digital Marketing',
                        'description' => 'Boost your online presence with our proven SEO strategies.',
                        'slug' => 'seo-marketing'
                    ],
                    [
                        'icon' => 'bot',
                        'title' => 'AI Solutions',
                        'description' => 'Intelligent chatbots and AI-powered automation for your business.',
                        'slug' => 'ai-solutions'
                    ]
                ];

                foreach ($services as $service): ?>
                <a href="<?php echo SITE_URL; ?>/services.php?service=<?php echo $service['slug']; ?>">
                    <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all card-hover border border-gray-100">
                        <i data-lucide="<?php echo $service['icon']; ?>" class="w-12 h-12 text-blue-600 mb-4"></i>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900"><?php echo $service['title']; ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                        <span class="text-blue-600 font-medium inline-flex items-center">
                            Learn More 
                            <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900">Why Choose HashCodeLab</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    We're committed to delivering excellence in every project
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $features = [
                    ['icon' => 'check-circle', 'title' => 'Expert Team', 'description' => 'Skilled professionals with years of industry experience'],
                    ['icon' => 'check-circle', 'title' => 'Quality Assurance', 'description' => 'Rigorous testing and quality control processes'],
                    ['icon' => 'check-circle', 'title' => '24/7 Support', 'description' => 'Round-the-clock technical support for your peace of mind'],
                    ['icon' => 'check-circle', 'title' => 'On-Time Delivery', 'description' => 'We respect deadlines and deliver projects on schedule']
                ];
                foreach ($features as $feature): ?>
                <div class="text-center">
                    <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="<?php echo $feature['icon']; ?>" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900"><?php echo $feature['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $feature['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Showcase -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900">Our Recent Work</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Explore our portfolio of successful projects
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($projects as $project): ?>
                <a href="<?php echo SITE_URL; ?>/project-detail.php?slug=<?php echo $project['slug']; ?>">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="<?php echo $project['image']; ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <span class="text-sm text-blue-600 font-medium"><?php echo $project['category']; ?></span>
                            <h3 class="text-xl font-semibold mt-2 mb-2 text-gray-900"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($project['description']); ?></p>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo SITE_URL; ?>/portfolio.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium inline-flex items-center transition-colors">
                    View All Projects 
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php
                $stats = [
                    ['number' => '10+', 'label' => 'Years Experience'],
                    ['number' => '500+', 'label' => 'Projects Completed'],
                    ['number' => '350+', 'label' => 'Happy Clients'],
                    ['number' => '25+', 'label' => 'Team Members']
                ];
                foreach ($stats as $stat): ?>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold mb-2"><?php echo $stat['number']; ?></div>
                    <div class="text-blue-100"><?php echo $stat['label']; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900">What Our Clients Say</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Don't just take our word for it
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($testimonials as $testimonial): ?>
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                        <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-current"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-700 mb-6 italic">"<?php echo htmlspecialchars($testimonial['content']); ?>"</p>
                    <div class="flex items-center">
                        <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo htmlspecialchars($testimonial['name']); ?>" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-semibold text-gray-900"><?php echo htmlspecialchars($testimonial['name']); ?></div>
                            <div class="text-sm text-gray-600"><?php echo htmlspecialchars($testimonial['position']); ?>, <?php echo htmlspecialchars($testimonial['company']); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900">Latest from Our Blog</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Insights, tips, and industry news
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($blogPosts as $post): ?>
                <a href="<?php echo SITE_URL; ?>/blog-post.php?slug=<?php echo $post['slug']; ?>">
                    <article class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <span class="text-sm text-blue-600 font-medium"><?php echo $post['category']; ?></span>
                            <h3 class="text-xl font-semibold mt-2 mb-2 text-gray-900"><?php echo htmlspecialchars($post['title']); ?></h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            <div class="text-sm text-gray-500">By <?php echo htmlspecialchars($post['author']); ?></div>
                        </div>
                    </article>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo SITE_URL; ?>/blog.php" class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-3 rounded-lg font-medium inline-flex items-center transition-colors">
                    View All Posts 
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
                    Ready to Start Your Project?
                </h2>
                <p class="text-base sm:text-lg mb-8 text-blue-100">
                    Let's discuss how we can help transform your business with our innovative IT solutions.
                </p>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center justify-center transition-colors">
                    Get in Touch 
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>
</div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

<?php include 'includes/footer.php'; ?>
