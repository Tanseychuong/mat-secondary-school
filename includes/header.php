<?php
// Determine the current page filename so the nav can highlight it.
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ' : ''; ?>Mat Secondary School</title>
    <meta name="description" content="Mat Secondary School - official website with information on academics, news, events, and admissions enquiries.">
    <link rel="stylesheet" href="<?php echo isset($basePath) ? $basePath : ''; ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php" class="logo">
            <span class="logo-mark">MSS</span>
            <span class="logo-text">Mat Secondary School</span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="site-nav" id="siteNav">
            <ul>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>about.php" class="<?php echo $currentPage === 'about.php' ? 'active' : ''; ?>">About</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>academics.php" class="<?php echo $currentPage === 'academics.php' ? 'active' : ''; ?>">Academics</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>news.php" class="<?php echo $currentPage === 'news.php' ? 'active' : ''; ?>">News & Events</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>contact.php" class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
