<?php
require_once 'config.php';
require_once 'functions.php';

$page_title = 'Blog - HashCodeLab';
$page_description = 'Read the latest insights, tips, and industry news from HashCodeLab experts.';

// Get search query
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';

// Fetch blog posts
$blogPosts = getBlogPosts();

// Filter by search
if ($search) {
    $blogPosts = array_filter($blogPosts, function($post) use ($search) {
        return stripos($post['title'], $search) !== false || 
               stripos($post['excerpt'], $search) !== false ||
               stripos($post['content'], $search) !== false;
    });
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">Our Blog</h1>
                <p class="text-base sm:text-lg text-blue-100">
                    Insights, tips, and the latest industry trends
                </p>
            </div>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <form method="GET" action="" class="max-w-2xl mx-auto">
                <div class="flex gap-2">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search articles..." class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Search
                    </button>
                </div>
            </form>
            <?php if ($search): ?>
            <div class="text-center mt-4">
                <span class="text-gray-600">Showing results for: <strong><?php echo htmlspecialchars($search); ?></strong></span>
                <a href="blog.php" class="ml-4 text-blue-600 hover:underline">Clear search</a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <?php if (empty($blogPosts)): ?>
            <div class="text-center py-12">
                <i data-lucide="search" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No articles found</h3>
                <p class="text-gray-600">Try searching with different keywords</p>
            </div>
            <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($blogPosts as $post): ?>
                <a href="<?php echo SITE_URL; ?>/blog-post.php?slug=<?php echo $post['slug']; ?>">
                    <article class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-sm text-blue-600 font-medium"><?php echo $post['category']; ?></span>
                                <span class="text-sm text-gray-400">•</span>
                                <span class="text-sm text-gray-500"><?php echo formatDate($post['published_date']); ?></span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-gray-900"><?php echo htmlspecialchars($post['title']); ?></h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">By <?php echo htmlspecialchars($post['author']); ?></span>
                                <span class="text-blue-600 font-medium inline-flex items-center">
                                    Read More
                                    <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                                </span>
                            </div>
                        </div>
                    </article>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6 text-gray-900">Stay Updated</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Subscribe to our newsletter for the latest articles and insights
                </p>
                <form class="flex gap-2 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address" required class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    lucide.createIcons();
</script>

<?php include 'includes/footer.php'; ?>