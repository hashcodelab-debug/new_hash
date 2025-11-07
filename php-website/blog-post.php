<?php
require_once 'config.php';
require_once 'functions.php';

// Get slug from URL
$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : '';

if (!$slug) {
    header('Location: ' . SITE_URL . '/blog.php');
    exit;
}

// Fetch blog post
$post = getBlogPostBySlug($slug);

if (!$post) {
    header('Location: ' . SITE_URL . '/404.php');
    exit;
}

// Fetch related posts
$relatedPosts = array_filter(getBlogPosts(4), function($p) use ($post) {
    return $p['id'] !== $post['id'] && $p['category'] === $post['category'];
});
$relatedPosts = array_slice($relatedPosts, 0, 3);

$page_title = htmlspecialchars($post['title']) . ' - HashCodeLab Blog';
$page_description = htmlspecialchars($post['excerpt']);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-4">
                    <a href="<?php echo SITE_URL; ?>/blog.php" class="text-blue-100 hover:text-white inline-flex items-center">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Blog
                    </a>
                </div>
                <span class="inline-block bg-blue-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-4"><?php echo $post['category']; ?></span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
                <div class="flex items-center gap-4 text-blue-100">
                    <span>By <?php echo htmlspecialchars($post['author']); ?></span>
                    <span>•</span>
                    <span><?php echo formatDate($post['published_date']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-96 object-cover rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    <?php echo $post['content']; ?>
                </div>

                <!-- Tags -->
                <?php if (!empty($post['tags'])): 
                    $tags = json_decode($post['tags'], true);
                    if ($tags && is_array($tags)):
                ?>
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($tags as $tag): ?>
                        <span class="bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-sm"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; endif; ?>

                <!-- Share -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900">Share this article</h3>
                    <div class="flex gap-4">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(SITE_URL . '/blog-post.php?slug=' . $post['slug']); ?>&text=<?php echo urlencode($post['title']); ?>" target="_blank" class="bg-blue-400 hover:bg-blue-500 text-white p-3 rounded-full transition-colors">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL . '/blog-post.php?slug=' . $post['slug']); ?>" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode(SITE_URL . '/blog-post.php?slug=' . $post['slug']); ?>&title=<?php echo urlencode($post['title']); ?>" target="_blank" class="bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-full transition-colors">
                            <i data-lucide="linkedin" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    <?php if (!empty($relatedPosts)): ?>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-gray-900">Related Articles</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <?php foreach ($relatedPosts as $relatedPost): ?>
                    <a href="<?php echo SITE_URL; ?>/blog-post.php?slug=<?php echo $relatedPost['slug']; ?>">
                        <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all">
                            <img src="<?php echo $relatedPost['image']; ?>" alt="<?php echo htmlspecialchars($relatedPost['title']); ?>" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-blue-600 font-medium"><?php echo $relatedPost['category']; ?></span>
                                <h3 class="text-lg font-semibold mt-2 mb-2 text-gray-900"><?php echo htmlspecialchars($relatedPost['title']); ?></h3>
                                <p class="text-sm text-gray-600"><?php echo htmlspecialchars(substr($relatedPost['excerpt'], 0, 80)) . '...'; ?></p>
                            </div>
                        </article>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>

<script>
    lucide.createIcons();
</script>

<?php include 'includes/footer.php'; ?>