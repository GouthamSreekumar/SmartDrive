<?php
/**
 * SmartDrive - SMTP & Mail Configuration Loader
 *
 * Supports three ways to configure SMTP (without hardcoding secrets into Git):
 * 1. Local PHP Config: Copy `config.local.example.php` to `config.local.php`
 * 2. Environment File: Copy `.env.example` to `.env`
 * 3. System / Hosting Environment Variables (Docker, CI/CD, cPanel, Cloud)
 *
 * `config.local.php` and `.env` are listed in `.gitignore` and will never be pushed.
 */

// 1. Load from .env if present
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || strpos($trimmed, '#') === 0) continue;
        $parts = explode('=', $trimmed, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $val = trim($parts[1], " \t\n\r\0\x0B\"'");
            if (getenv($key) === false) {
                putenv("$key=$val");
            }
        }
    }
}

// 2. Load from config.local.php if present
$localConfig = __DIR__ . '/config.local.php';
if (file_exists($localConfig)) {
    require_once($localConfig);
}

// 3. Fallback defines with safe placeholders
if (!defined('SMTP_HOST')) {
    define('SMTP_HOST', getenv('SMTP_HOST') ?: 'smtp.gmail.com');
}

if (!defined('SMTP_PORT')) {
    define('SMTP_PORT', (int)(getenv('SMTP_PORT') ?: 587));
}

if (!defined('SMTP_USER')) {
    define('SMTP_USER', getenv('SMTP_USER') ?: 'your_email@gmail.com');
}

if (!defined('SMTP_PASS')) {
    define('SMTP_PASS', getenv('SMTP_PASS') ?: 'your_gmail_app_password');
}

if (!defined('SMTP_FROM_EMAIL')) {
    define('SMTP_FROM_EMAIL', getenv('SMTP_FROM_EMAIL') ?: (defined('SMTP_USER') && SMTP_USER !== 'your_email@gmail.com' ? SMTP_USER : 'your_email@gmail.com'));
}

if (!defined('SMTP_FROM_NAME')) {
    define('SMTP_FROM_NAME', getenv('SMTP_FROM_NAME') ?: 'Smart Drive');
}

if (!defined('SMTP_SECURE')) {
    define('SMTP_SECURE', getenv('SMTP_SECURE') ?: 'tls');
}
