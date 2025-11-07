<?php
require_once 'config.php';

$page_title = 'About Us - HashCodeLab';
$page_description = 'Learn about HashCodeLab, a leading IT services company with over 10 years of experience in web design, app development, and digital solutions.';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">About HashCodeLab</h1>
                <p class="text-base sm:text-lg text-blue-100">
                    Empowering businesses with innovative IT solutions since 2014
                </p>
            </div>
        </div>
    </section>

    <!-- Company Story -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-gray-900">Our Story</h2>
                <div class="prose prose-lg text-gray-600 space-y-4">
                    <p>
                        HashCodeLab was founded in 2014 with a simple mission: to help businesses leverage technology to achieve their goals. What started as a small team of passionate developers has grown into a full-service IT company serving clients worldwide.
                    </p>
                    <p>
                        Over the past decade, we've completed over 500 projects for more than 350 clients across various industries. Our commitment to quality, innovation, and client satisfaction has made us a trusted partner for businesses of all sizes.
                    </p>
                    <p>
                        Today, our team of 25+ experts specializes in web design, mobile app development, AI solutions, and digital marketing. We stay at the forefront of technology trends to deliver cutting-edge solutions that drive real business results.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="target" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Our Mission</h3>
                    <p class="text-gray-600">
                        To empower businesses with innovative technology solutions that drive growth, efficiency, and competitive advantage in the digital age.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="eye" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Our Vision</h3>
                    <p class="text-gray-600">
                        To be the leading IT services company recognized globally for excellence, innovation, and transforming businesses through technology.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="heart" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Our Values</h3>
                    <p class="text-gray-600">
                        Excellence, integrity, innovation, collaboration, and client success. These values guide everything we do.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Meet Our Leadership Team</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Experienced professionals dedicated to your success
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $team = [
                    ['name' => 'John Anderson', 'role' => 'CEO & Founder', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400'],
                    ['name' => 'Sarah Mitchell', 'role' => 'CTO', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400'],
                    ['name' => 'Michael Chen', 'role' => 'Head of Design', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400'],
                    ['name' => 'Emily Rodriguez', 'role' => 'Marketing Director', 'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400']
                ];
                foreach ($team as $member): ?>
                <div class="text-center">
                    <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-semibold text-gray-900"><?php echo $member['name']; ?></h3>
                    <p class="text-gray-600"><?php echo $member['role']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-20 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Our Achievements</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php
                $stats = [
                    ['number' => '10+', 'label' => 'Years in Business'],
                    ['number' => '500+', 'label' => 'Projects Delivered'],
                    ['number' => '350+', 'label' => 'Happy Clients'],
                    ['number' => '25+', 'label' => 'Team Members']
                ];
                foreach ($stats as $stat): ?>
                <div class="text-center">
                    <div class="text-5xl font-bold text-blue-600 mb-2"><?php echo $stat['number']; ?></div>
                    <div class="text-gray-600"><?php echo $stat['label']; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6">Ready to Work With Us?</h2>
                <p class="text-lg mb-8 text-blue-100">
                    Let's discuss how we can help transform your business with our IT solutions.
                </p>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium inline-flex items-center transition-colors">
                    Get in Touch
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