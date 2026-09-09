<?php
$pageTitle = 'Home';
$basePath = '';
require_once __DIR__ . '/config/database.php';

// Fetch the 3 most recent news items for the homepage preview.
$recentNews = [];
try {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT id, title, content, event_date FROM news ORDER BY event_date DESC, created_at DESC LIMIT 3');
    $recentNews = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Failed to fetch recent news: ' . $e->getMessage());
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container hero-inner">
        <h1>Welcome to Mat Secondary School</h1>
        <p class="hero-subtitle">Empowering students to learn, grow, and lead — every single day.</p>
        <div class="hero-actions">
            <a href="about.php" class="btn btn-primary">Learn More</a>
            <a href="contact.php" class="btn btn-outline">Contact Us</a>
        </div>
    </div>
</section>

<section class="section intro-section">
    <div class="container">
        <h2>About Our School</h2>
        <p>
            Mat Secondary School is committed to providing a well-rounded education that prepares
            students for academic success and responsible citizenship. Our dedicated teachers,
            supportive environment, and focus on both academics and character development make us
            a place where every student can thrive.
        </p>
        <a href="about.php" class="link-arrow">Read more about us &rarr;</a>
    </div>
</section>

<section class="section highlights-section">
    <div class="container">
        <h2>School Highlights</h2>
        <div class="highlights-grid">
            <div class="highlight-card">
                <div class="highlight-icon">📚</div>
                <h3>Strong Academics</h3>
                <p>A broad curriculum delivered by experienced, dedicated teaching staff.</p>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">🏫</div>
                <h3>Safe Environment</h3>
                <p>A supportive and secure campus where students can focus on learning.</p>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">🎯</div>
                <h3>Holistic Growth</h3>
                <p>Clubs, sports, and activities that build character alongside academic skill.</p>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">🤝</div>
                <h3>Community Focus</h3>
                <p>Strong partnership between the school, students, and parents.</p>
            </div>
        </div>
    </div>
</section>

<section class="section news-preview-section">
    <div class="container">
        <h2>Recent News & Events</h2>

        <?php if (!empty($recentNews)): ?>
            <div class="news-grid">
                <?php foreach ($recentNews as $item): ?>
                    <article class="news-card">
                        <span class="news-date"><?php echo htmlspecialchars(date('M j, Y', strtotime($item['event_date']))); ?></span>
                        <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                        <?php
                            $preview = $item['content'];
                            if (strlen($preview) > 120) {
                                $preview = substr($preview, 0, 120) . '...';
                            }
                        ?>
                        <p><?php echo htmlspecialchars($preview); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <a href="news.php" class="link-arrow">View all news &rarr;</a>
        <?php else: ?>
            <p>No news or events have been posted yet. Please check back soon.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section cta-section">
    <div class="container cta-inner">
        <h2>Have a Question?</h2>
        <p>We'd love to hear from you. Reach out and our team will get back to you shortly.</p>
        <a href="contact.php" class="btn btn-primary">Get In Touch</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
