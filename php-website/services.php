<?php
require_once 'config.php';

// Get service from URL
$service = isset($_GET['service']) ? sanitize($_GET['service']) : 'web-design';

// Define all services
$services = [
    'web-design' => [
        'title' => 'Web Design & Development',
        'icon' => 'code',
        'description' => 'Create stunning, responsive websites that engage your audience and drive results.',
        'long_description' => 'Our web design and development services combine creativity with technical expertise to deliver websites that not only look beautiful but also perform exceptionally. We specialize in creating custom, responsive websites that work flawlessly across all devices and browsers.',
        'features' => [
            'Custom Website Design',
            'Responsive Mobile-First Approach',
            'E-commerce Solutions',
            'Content Management Systems',
            'Search Engine Optimization',
            'Performance Optimization',
            'Security Implementation',
            'Ongoing Maintenance & Support'
        ],
        'benefits' => [
            'Increased Online Visibility',
            'Better User Experience',
            'Higher Conversion Rates',
            'Mobile-Friendly Design',
            'Fast Loading Speed',
            'Secure & Reliable'
        ]
    ],
    'app-development' => [
        'title' => 'App Development',
        'icon' => 'smartphone',
        'description' => 'Build powerful mobile applications for iOS and Android platforms.',
        'long_description' => 'We develop high-performance mobile applications that deliver exceptional user experiences. Whether you need a native iOS app, Android app, or cross-platform solution, our team has the expertise to bring your vision to life.',
        'features' => [
            'iOS App Development (Swift)',
            'Android App Development (Kotlin)',
            'Cross-Platform Development (React Native)',
            'UI/UX Design',
            'API Integration',
            'Push Notifications',
            'In-App Purchases',
            'App Store Submission'
        ],
        'benefits' => [
            'Reach Mobile Users',
            'Increase Engagement',
            'Build Brand Loyalty',
            'Offline Functionality',
            'Native Performance',
            'App Store Visibility'
        ]
    ],
    'web-applications' => [
        'title' => 'Web Applications',
        'icon' => 'globe',
        'description' => 'Develop scalable web applications using modern technologies like React, PHP, and WordPress.',
        'long_description' => 'Our web application development services help businesses automate processes, improve efficiency, and scale operations. We build custom solutions using the latest technologies and best practices.',
        'features' => [
            'React & Next.js Applications',
            'PHP & Laravel Development',
            'WordPress Custom Development',
            'Database Design & Optimization',
            'RESTful API Development',
            'Real-time Features',
            'Cloud Deployment',
            'Scalable Architecture'
        ],
        'benefits' => [
            'Improved Efficiency',
            'Process Automation',
            'Scalable Solutions',
            'Better Data Management',
            'Enhanced Collaboration',
            'Cost Reduction'
        ]
    ],
    'graphic-design' => [
        'title' => 'Graphic Design',
        'icon' => 'palette',
        'description' => 'Professional graphic design services for logos, branding, and marketing materials.',
        'long_description' => 'Create a memorable brand identity with our professional graphic design services. From logos to complete brand guidelines, we help businesses establish a strong visual presence.',
        'features' => [
            'Logo Design',
            'Brand Identity Development',
            'Business Card Design',
            'Brochure & Flyer Design',
            'Social Media Graphics',
            'Infographic Design',
            'Packaging Design',
            'Print & Digital Materials'
        ],
        'benefits' => [
            'Strong Brand Identity',
            'Professional Image',
            'Increased Recognition',
            'Better Marketing Results',
            'Consistent Branding',
            'Stand Out from Competition'
        ]
    ],
    'seo-marketing' => [
        'title' => 'SEO & Digital Marketing',
        'icon' => 'trending-up',
        'description' => 'Boost your online visibility and drive traffic with proven SEO and marketing strategies.',
        'long_description' => 'Our SEO and digital marketing services help businesses increase their online visibility, attract more qualified traffic, and convert visitors into customers. We use data-driven strategies to deliver measurable results.',
        'features' => [
            'Search Engine Optimization',
            'Google Ads Management',
            'Social Media Marketing',
            'Content Marketing',
            'Email Marketing',
            'Analytics & Reporting',
            'Conversion Optimization',
            'Local SEO'
        ],
        'benefits' => [
            'Higher Search Rankings',
            'Increased Website Traffic',
            'Better ROI',
            'Brand Awareness',
            'Lead Generation',
            'Competitive Advantage'
        ]
    ],
    'ai-solutions' => [
        'title' => 'AI Solutions',
        'icon' => 'bot',
        'description' => 'Implement intelligent chatbots and AI-powered automation to enhance your business.',
        'long_description' => 'Leverage the power of artificial intelligence to automate tasks, improve customer service, and gain valuable insights. Our AI solutions are designed to help businesses work smarter and more efficiently.',
        'features' => [
            'AI Chatbot Development',
            'Natural Language Processing',
            'Machine Learning Models',
            'Predictive Analytics',
            'Process Automation',
            'Image Recognition',
            'Sentiment Analysis',
            'Custom AI Solutions'
        ],
        'benefits' => [
            '24/7 Customer Support',
            'Reduced Operational Costs',
            'Improved Efficiency',
            'Better Decision Making',
            'Enhanced Customer Experience',
            'Competitive Advantage'
        ]
    ]
];

if (!isset($services[$service])) {
    header('Location: ' . SITE_URL . '/404.php');
    exit;
}

$currentService = $services[$service];
$page_title = $currentService['title'] . ' - HashCodeLab Services';
$page_description = $currentService['description'];

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6">
                    <i data-lucide="<?php echo $currentService['icon']; ?>" class="w-16 h-16 mx-auto text-blue-100"></i>
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6"><?php echo $currentService['title']; ?></h1>
                <p class="text-lg text-blue-100 mb-8"><?php echo $currentService['description']; ?></p>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center transition-colors">
                    Get Started
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Overview -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-gray-900">Overview</h2>
                <p class="text-lg text-gray-600 leading-relaxed"><?php echo $currentService['long_description']; ?></p>
            </div>
        </div>
    </section>

    <!-- Features & Benefits -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Features -->
                    <div>
                        <h2 class="text-3xl font-bold mb-8 text-gray-900">What We Offer</h2>
                        <ul class="space-y-4">
                            <?php foreach ($currentService['features'] as $feature): ?>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-green-600 flex-shrink-0 mt-1"></i>
                                <span class="text-gray-700 text-lg"><?php echo $feature; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Benefits -->
                    <div>
                        <h2 class="text-3xl font-bold mb-8 text-gray-900">Benefits</h2>
                        <ul class="space-y-4">
                            <?php foreach ($currentService['benefits'] as $benefit): ?>
                            <li class="flex items-start gap-3">
                                <i data-lucide="star" class="w-6 h-6 text-blue-600 flex-shrink-0 mt-1"></i>
                                <span class="text-gray-700 text-lg"><?php echo $benefit; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Services -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Other Services</h2>
                <p class="text-gray-600">Explore our complete range of IT solutions</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($services as $slug => $svc):
                    if ($slug === $service) continue; ?>
                <a href="?service=<?php echo $slug; ?>" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all border border-gray-100">
                    <i data-lucide="<?php echo $svc['icon']; ?>" class="w-10 h-10 text-blue-600 mb-3"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900"><?php echo $svc['title']; ?></h3>
                    <p class="text-gray-600 text-sm"><?php echo $svc['description']; ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-lg mb-8 text-blue-100">
                    Let's discuss how our <?php echo strtolower($currentService['title']); ?> services can benefit your business.
                </p>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center transition-colors">
                    Contact Us Now
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>
</div>

<script>
    lucide.createIcons();
</script>

<?php include 'includes/footer.php'; ?>