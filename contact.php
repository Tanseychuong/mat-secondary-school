<?php
$pageTitle = 'Contact Us';
$basePath = '';
require_once __DIR__ . '/config/database.php';

$errors = [];
$successMessage = null;

// Preserve submitted values so the form can be re-populated on error.
$formData = [
    'name'    => '',
    'email'   => '',
    'subject' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and trim input.
    $formData['name']    = trim($_POST['name'] ?? '');
    $formData['email']   = trim($_POST['email'] ?? '');
    $formData['subject'] = trim($_POST['subject'] ?? '');
    $formData['message'] = trim($_POST['message'] ?? '');

    // --- Server-side validation -------------------------------------
    // Client-side (JS/jQuery) validation is for user experience only;
    // it must never be trusted, so every field is re-validated here.
    if ($formData['name'] === '') {
        $errors[] = 'Please enter your name.';
    }

    if ($formData['email'] === '') {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if ($formData['subject'] === '') {
        $errors[] = 'Please enter a subject.';
    }

    if ($formData['message'] === '') {
        $errors[] = 'Please enter your message.';
    }

    if (empty($errors)) {
        try {
            $pdo = getDbConnection();
            $stmt = $pdo->prepare(
                'INSERT INTO enquiries (name, email, subject, message, created_at)
                 VALUES (:name, :email, :subject, :message, NOW())'
            );
            $stmt->execute([
                ':name'    => $formData['name'],
                ':email'   => $formData['email'],
                ':subject' => $formData['subject'],
                ':message' => $formData['message'],
            ]);

            $successMessage = 'Thank you! Your enquiry has been received. We will get back to you soon.';

            // Clear the form after a successful submission.
            $formData = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
        } catch (PDOException $e) {
            error_log('Failed to insert enquiry: ' . $e->getMessage());
            $errors[] = 'Sorry, something went wrong while sending your message. Please try again later.';
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Have a question? Send us a message and we'll respond as soon as we can.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-layout">
        <div class="contact-form-wrapper">
            <h2>Send an Enquiry</h2>

            <?php if ($successMessage): ?>
                <p class="alert alert-success"><?php echo htmlspecialchars($successMessage); ?></p>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form id="contactForm" action="contact.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($formData['name']); ?>">
                    <span class="field-error" id="nameError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>">
                    <span class="field-error" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($formData['subject']); ?>">
                    <span class="field-error" id="subjectError"></span>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6"><?php echo htmlspecialchars($formData['message']); ?></textarea>
                    <span class="field-error" id="messageError"></span>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

        <div class="contact-info-wrapper">
            <h2>School Information</h2>
            <ul class="contact-details">
                <li><strong>Address:</strong> 123 School Road, Accra, Ghana</li>
                <li><strong>Email:</strong> info@matsecondaryschool.edu.gh</li>
                <li><strong>Phone:</strong> +233 000 000 000</li>
                <li><strong>Office Hours:</strong> Monday - Friday, 8:00 AM - 4:00 PM</li>
            </ul>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
