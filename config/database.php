<?php
/**
 * Database connection configuration for Mat Secondary School Website.
 *
 * Centralizes the PDO connection so every other PHP file can reuse it
 * instead of repeating credentials and connection logic.
 *
 * IMPORTANT: Update the constants below with your actual hosting
 * credentials before deployment. Do not commit real production
 * credentials to a public repository.
 */

// --- Database credentials -------------------------------------------------
define('DB_HOST', 'sql110.infinityfree.com');
define('DB_NAME', 'if0_42877189_mat_ss');
define('DB_USER', 'if0_42877189');
define('DB_PASS', 'hC1AfJ43YJkyz');
define('DB_CHARSET', 'utf8mb4');

/**
 * Returns a shared PDO instance connected to the MySQL database.
 * Uses a static variable so the connection is only created once per request.
 *
 * @return PDO
 */
function getDbConnection(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // Avoid leaking credentials or internal details to visitors.
            error_log('Database connection failed: ' . $e->getMessage());
            die('Sorry, something went wrong connecting to the database. Please try again later.');
        }
    }

    return $pdo;
}
