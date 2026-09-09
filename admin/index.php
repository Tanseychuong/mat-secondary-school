<?php
$pageTitle = 'Admin - Enquiries';
$basePath = '../';
require_once __DIR__ . '/../config/database.php';

/**
 * NOTE: This administrative page is intended as a demonstration of
 * retrieving data from MySQL. It does not include authentication.
 * /

$enquiries = [];
$fetchError = null;

try {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT id, name, email, subject, message, created_at FROM enquiries ORDER BY created_at DESC');
    $enquiries = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Failed to fetch enquiries: ' . $e->getMessage());
    $fetchError = 'Could not load enquiries right now. Please check the database connection.';
}

require_once __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Admin: Submitted Enquiries</h1>
        <p>A simple view of enquiries submitted through the contact form.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ($fetchError): ?>
            <p class="alert alert-error"><?php echo htmlspecialchars($fetchError); ?></p>
        <?php elseif (empty($enquiries)): ?>
            <p>No enquiries have been submitted yet.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enquiries as $enquiry): ?>
                            <tr>
                                <td><?php echo (int) $enquiry['id']; ?></td>
                                <td><?php echo htmlspecialchars($enquiry['name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['subject']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($enquiry['message'])); ?></td>
                                <td><?php echo htmlspecialchars(date('M j, Y g:i A', strtotime($enquiry['created_at']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
