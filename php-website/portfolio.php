<?php
require_once 'config.php';
require_once 'functions.php';

$page_title = 'Portfolio - HashCodeLab';
$page_description = 'Explore our portfolio of successful projects across web development, mobile apps, design, and more.';

// Get category filter
$category = isset($_GET['category']) ? sanitize($_GET['category']) : 'all';

// Fetch projects
$allProjects = getProjects();

// Filter by category
if ($category !== 'all') {
    $projects = array_filter($allProjects, function($project) use ($category) {
        return strtolower($project['category']) === strtolower($category);
    });
} else {
    $projects = $allProjects;
}

// Get unique categories
$categories = array_unique(array_column($allProjects, 'category'));

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">Our Portfolio</h1>
                <p class="text-base sm:text-lg text-blue-100">
                    Showcasing our best work and successful client projects
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="py-8 bg-gray-50 sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="?category=all" class="px-6 py-2 rounded-full font-medium transition-colors <?php echo $category === 'all' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-blue-50'; ?>">
                    All Projects
                </a>
                <?php foreach ($categories as $cat): ?>
                <a href="?category=<?php echo urlencode($cat); ?>" class="px-6 py-2 rounded-full font-medium transition-colors <?php echo $category === $cat ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-blue-50'; ?>">
                    <?php echo htmlspecialchars($cat); ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <?php if (empty($projects)): ?>
            <div class="text-center py-12">
                <i data-lucide="folder-open" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No projects found</h3>
                <p class="text-gray-600">Try selecting a different category</p>
            </div>
            <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($projects as $project): ?>
                <a href="<?php echo SITE_URL; ?>/project-detail.php?slug=<?php echo $project['slug']; ?>">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                        <div class="h-56 bg-gray-200 overflow-hidden">
                            <img src="<?php echo $project['image']; ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <span class="text-sm text-blue-600 font-medium"><?php echo $project['category']; ?></span>
                            <h3 class="text-xl font-semibold mt-2 mb-2 text-gray-900"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($project['description']); ?></p>
                            <div class="flex items-center gap-2 mb-4">
                                <?php 
                                $technologies = json_decode($project['technologies'], true);
                                if ($technologies && is_array($technologies)):
                                    foreach (array_slice($technologies, 0, 3) as $tech):
                                ?>
                                <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full"><?php echo htmlspecialchars($tech); ?></span>
                                <?php endforeach; endif; ?>
                            </div>
                            <span class="text-blue-600 font-medium inline-flex items-center">
                                View Project
                                <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6">Ready to Start Your Project?</h2>
                <p class="text-lg mb-8 text-blue-100">
                    Let's create something amazing together
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