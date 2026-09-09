<?php
$pageTitle = 'News & Events';
$basePath = '';
require_once __DIR__ . '/config/database.php';

$newsItems = [];
$fetchError = null;

try {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT id, title, content, event_date FROM news ORDER BY event_date DESC, created_at DESC');
    $newsItems = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Failed to fetch news: ' . $e->getMessage());
    $fetchError = 'We could not load news and events right now. Please try again later.';
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>News & Events</h1>
        <p>Stay up to date with the latest announcements and happenings at Mat Secondary School.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ($fetchError): ?>
            <p class="alert alert-error"><?php echo htmlspecialchars($fetchError); ?></p>
        <?php elseif (empty($newsItems)): ?>
            <p>No news or events have been posted yet. Please check back soon.</p>
        <?php else: ?>
            <div class="news-list">
                <?php foreach ($newsItems as $item): ?>
                    <article class="news-list-item">
                        <div class="news-list-date">
                            <span class="day"><?php echo htmlspecialchars(date('d', strtotime($item['event_date']))); ?></span>
                            <span class="month"><?php echo htmlspecialchars(date('M', strtotime($item['event_date']))); ?></span>
                        </div>
                        <div class="news-list-content">
                            <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($item['content'])); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
