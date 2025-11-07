<?php
require_once 'config.php';
require_once 'functions.php';

// Get slug from URL
$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : '';

if (!$slug) {
    header('Location: ' . SITE_URL . '/portfolio.php');
    exit;
}

// Fetch project
$project = getProjectBySlug($slug);

if (!$project) {
    header('Location: ' . SITE_URL . '/404.php');
    exit;
}

$page_title = htmlspecialchars($project['title']) . ' - HashCodeLab Portfolio';
$page_description = htmlspecialchars($project['description']);

// Parse JSON fields
$technologies = json_decode($project['technologies'], true) ?? [];
$images = json_decode($project['images'], true) ?? [];

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="mb-4">
                    <a href="<?php echo SITE_URL; ?>/portfolio.php" class="text-blue-100 hover:text-white inline-flex items-center">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Portfolio
                    </a>
                </div>
                <span class="inline-block bg-blue-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-4"><?php echo $project['category']; ?></span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4"><?php echo htmlspecialchars($project['title']); ?></h1>
                <p class="text-lg text-blue-100"><?php echo htmlspecialchars($project['description']); ?></p>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <img src="<?php echo $project['image']; ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-[500px] object-cover rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-12">
                        <!-- Problem -->
                        <div>
                            <h2 class="text-3xl font-bold mb-4 text-gray-900">The Challenge</h2>
                            <p class="text-gray-600 text-lg leading-relaxed"><?php echo nl2br(htmlspecialchars($project['problem'])); ?></p>
                        </div>

                        <!-- Solution -->
                        <div>
                            <h2 class="text-3xl font-bold mb-4 text-gray-900">Our Solution</h2>
                            <p class="text-gray-600 text-lg leading-relaxed"><?php echo nl2br(htmlspecialchars($project['solution'])); ?></p>
                        </div>

                        <!-- Results -->
                        <div>
                            <h2 class="text-3xl font-bold mb-4 text-gray-900">Results & Impact</h2>
                            <p class="text-gray-600 text-lg leading-relaxed"><?php echo nl2br(htmlspecialchars($project['results'])); ?></p>
                        </div>

                        <!-- Testimonial -->
                        <?php if ($project['testimonial']): ?>
                        <div class="bg-blue-50 p-8 rounded-xl">
                            <i data-lucide="quote" class="w-10 h-10 text-blue-600 mb-4"></i>
                            <p class="text-gray-700 text-lg italic mb-4">"<?php echo htmlspecialchars($project['testimonial']); ?>"</p>
                            <p class="text-gray-900 font-semibold"><?php echo htmlspecialchars($project['client']); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 p-6 rounded-xl sticky top-24">
                            <h3 class="text-xl font-bold mb-6 text-gray-900">Project Info</h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-2">Client</h4>
                                    <p class="text-gray-900"><?php echo htmlspecialchars($project['client']); ?></p>
                                </div>

                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-2">Category</h4>
                                    <p class="text-gray-900"><?php echo htmlspecialchars($project['category']); ?></p>
                                </div>

                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-3">Technologies</h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach ($technologies as $tech): ?>
                                        <span class="bg-blue-600 text-white text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($tech); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-gray-200">
                                    <a href="<?php echo SITE_URL; ?>/contact.php" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium inline-flex items-center justify-center transition-colors">
                                        Start Your Project
                                        <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- More Projects -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-gray-900">More Projects</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <?php
                    $moreProjects = array_filter(getProjects(4), function($p) use ($project) {
                        return $p['id'] !== $project['id'];
                    });
                    $moreProjects = array_slice($moreProjects, 0, 3);
                    foreach ($moreProjects as $p): ?>
                    <a href="<?php echo SITE_URL; ?>/project-detail.php?slug=<?php echo $p['slug']; ?>">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all">
                            <img src="<?php echo $p['image']; ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-blue-600 font-medium"><?php echo $p['category']; ?></span>
                                <h3 class="text-lg font-semibold mt-2 text-gray-900"><?php echo htmlspecialchars($p['title']); ?></h3>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    lucide.createIcons();
</script>

<?php include 'includes/footer.php'; ?>