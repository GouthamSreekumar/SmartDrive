<?php
/**
 * SmartDrive - Local Configuration Template
 *
 * HOW TO CONFIGURE YOUR OWN CREDENTIALS:
 * ---------------------------------------------------------
 * 1. Duplicate this file and rename it to: config.local.php
 * 2. Fill in your own database and SMTP details below.
 * 3. Save the file.
 *
 * NOTE: `config.local.php` is listed in `.gitignore`, so your
 * personal credentials will NEVER be committed to GitHub.
 * ---------------------------------------------------------
 */

// --- Database Configuration ---
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'drivingschool');

// --- SMTP / Email Configuration ---
// If using Gmail:
// 1. Enable 2-Step Verification on your Google Account.
// 2. Go to https://myaccount.google.com/apppasswords
// 3. Generate a 16-character "App Password" and paste it in SMTP_PASS below.
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);                        // 587 for TLS, 465 for SSL
define('SMTP_USER', 'your_email@gmail.com');      // Your full email address
define('SMTP_PASS', 'your_16_char_app_password'); // Your generated App Password (no spaces)
define('SMTP_FROM_EMAIL', 'your_email@gmail.com');
define('SMTP_FROM_NAME', 'Smart Drive');
define('SMTP_SECURE', 'tls');                    // 'tls' or 'ssl'

