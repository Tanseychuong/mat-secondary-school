</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-col">
            <h3>Mat Secondary School</h3>
            <p>Nurturing curious minds and building future leaders through quality education.</p>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php">Home</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>about.php">About Us</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>academics.php">Academics</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>news.php">News & Events</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact Info</h4>
            <ul class="contact-info">
                <li>123 School Road, Juba, South Sudan</li>
                <li>info@matsecondaryschool.edu.ss</li>
                <li>+211 000 000 000</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Mat Secondary School. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?php echo isset($basePath) ? $basePath : ''; ?>js/script.js"></script>
</body>

</html>