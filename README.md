# 🚗 SmartDrive - Driving School Management System

![PHP](https://img.shields.io/badge/PHP-7.4%20|%208.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT%20/%20Academic-blue?style=for-the-badge)

**SmartDrive** is a full-featured web-based Driving Academy Management & E-Learning Portal. It automates day-to-day driving school operations, including student admissions, instructor management, lesson scheduling, fee tracking, and online driving theory practice exams.

---

## 📌 Table of Contents
* [Key Features](#-key-features)
* [System Architecture & Roles](#-system-architecture--roles)
* [Project Structure](#-project-structure)
* [Prerequisites](#-prerequisites)
* [Installation & Setup](#-installation--setup)
* [Configuring Database & SMTP Email](#-configuring-database--smtp-email)
* [Default Demo Credentials](#-default-demo-credentials)
* [Setting up Gmail SMTP](#-setting-up-gmail-smtp)
* [Contributing & License](#-contributing--license)

---

## 🌟 Key Features

### 🎓 1. Student Portal (`/student`)
* **Online Admission:** Register online with automated age eligibility checks (> 17 years) and document/photo upload.
* **Session Schedule:** View practical on-road sessions and theoretical classroom timings.
* **RTO / License Mock Theory Exam:** Practice multiple-choice road safety questions with instant scoring and performance history.
* **Study Resources:** Download driving rule handbooks and PDF training materials.
* **Fee Payment & Receipts:** Submit course fees with card details and receive automated email receipts.
* **Instructor Feedback:** Submit reviews and ratings for instructors and sessions.

### 👨‍🏫 2. Instructor Portal (`/instructor`)
* **Batch & Schedule View:** Track assigned batches and schedule practical driving slots.
* **Question Bank Contribution:** Add and maintain questions for the student mock test bank.
* **Administrative Notices:** Stay updated on announcements and academy bulletins.

### 🛡️ 3. Admin Portal (`/admin`)
* **Student Verification:** Review admission applications and approve or reject candidates.
* **Course & Batch Management:** Configure courses, fees, batch capacities, and instructor assignments.
* **Schedule Oversight:** Manage practical and theory time tables.
* **Resource Management:** Upload curriculum materials and PDF guides.
* **Audit & Analytics:** Monitor transaction histories, student progress, and feedback.

---

## 🔄 System Workflow

```
[Student Registration] 
        │
        ▼
[Admin Review & Approval] ──(Active Status)──► [Batch & Instructor Assignment]
                                                              │
        ┌─────────────────────────────────────────────────────┴───────────────────────────────────┐
        ▼                                                     ▼                                   ▼
 [Class Schedule]                                    [PDF Study Materials]              [Fee Payment & Receipt]
        │                                                     │                                   │
        ▼                                                     ▼                                   ▼
 [Practical Lessons]                                 [Mock Theory Exam]                 [Instructor Feedback]
```

---

## 📂 Project Structure

```text
SmartDrive/
├── admin/                  # Admin dashboard, management modules & reports
│   ├── codes/              # Admin backend processing scripts
│   ├── documents/          # Uploaded student verification documents (ignored by Git)
│   └── pdf/                # Admin-uploaded PDF resources (ignored by Git)
├── instructor/             # Instructor dashboard & scheduling modules
│   └── codes/              # Instructor backend scripts
├── student/                # Student portal, mock tests, fee view & feedback
│   └── codes/              # Student backend scripts & mailer
├── codes/                  # Core authentication & onboarding handlers
│   └── PHPMailer/          # PHPMailer vendor library
├── assets/ css/ js/ fonts/ # Shared CSS stylesheets, JavaScript libraries & fonts
├── students/               # Student profile picture uploads (ignored by Git)
├── drivingschool.sql       # Clean database schema & seed data
├── connectionclass.php     # Reusable database connection abstraction
├── mail_config.php         # Centralized SMTP & mail loader
├── config.local.example.php# Template for local credentials
├── .env.example            # Template for environment-based configuration
├── .gitignore              # Git ignore rules for secrets, logs & uploads
└── README.md               # Documentation & setup guide
```

---

## ⚙️ Prerequisites
* **Web Server:** Apache (via [XAMPP](https://www.apachefriends.org/), WAMP, or standalone LAMP)
* **PHP:** Version 7.4 through 8.3 (tested with PHP 8.3)
* **Database:** MySQL 5.7+ or MariaDB 10.4+

---

## 🚀 Installation & Setup

### 1. Clone the Repository
Clone into your web server's root folder (`htdocs` for XAMPP):
```bash
cd C:/xampp/htdocs/
git clone <YOUR_GITHUB_REPO_URL> SmartDrive
```

### 2. Import the Database
1. Start **Apache** and **MySQL** in your XAMPP Control Panel.
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin/`).
3. Click **New** and create a database named `drivingschool`.
4. Select the database, click the **Import** tab, choose [`drivingschool.sql`](drivingschool.sql), and click **Import**.

---

## 🔐 Configuring Database & SMTP Email

To protect credentials, secrets are never committed directly. You can configure credentials using either of the following methods:

### Method A: Using `config.local.php` (Recommended for Local Dev)
1. Make a copy of [`config.local.example.php`](config.local.example.php):
   ```bash
   cp config.local.example.php config.local.php
   ```
2. Open `config.local.php` and set your credentials:
   ```php
   // Database Configuration
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'drivingschool');

   // SMTP Configuration
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_PORT', 587);
   define('SMTP_USER', 'your_email@gmail.com');
   define('SMTP_PASS', 'your_16_char_app_password');
   define('SMTP_FROM_EMAIL', 'your_email@gmail.com');
   define('SMTP_FROM_NAME', 'Smart Drive');
   define('SMTP_SECURE', 'tls');
   ```

### Method B: Using `.env`
1. Make a copy of [`.env.example`](.env.example):
   ```bash
   cp .env.example .env
   ```
2. Adjust your variables in `.env`.

> Both `config.local.php` and `.env` are listed in `.gitignore` and will never be pushed to your repository.

---

## 🔑 Default Demo Credentials

Pre-seeded accounts available immediately after importing `drivingschool.sql`:

| Role | Username / Email | Password | Access URL |
|---|---|---|---|
| **Admin** | `admin@gmail.com` | `admin` | `http://localhost/SmartDrive/login.php` |
| **Instructor** | `instructor@example.com` | `instructor123` | `http://localhost/SmartDrive/login.php` |
| **Student** | *(Register a new account via the registration page)* | User-defined | `http://localhost/SmartDrive/login.php` |

---

## 📧 Setting Up Gmail SMTP
If using Gmail to dispatch password reset OTPs and payment receipts:
1. Enable **2-Step Verification** on your Google Account: [Google Security Settings](https://myaccount.google.com/security).
2. Generate an App Password: [Google App Passwords](https://myaccount.google.com/apppasswords).
3. Select app **Other (Custom name)** and name it `SmartDrive`.
4. Copy the generated **16-character code** and paste it into `SMTP_PASS` in your `config.local.php` or `.env`.

---

## 🛡️ Security & Privacy Notice
* All hardcoded credentials, test accounts, and student Personally Identifiable Information (PII) have been completely removed from the repository.
* File uploads (`students/`, `admin/documents/`, `admin/pdf/`) and runtime temporary logs are excluded from source control via `.gitignore`.

---

## 📄 License
This project is licensed under the MIT License / Academic Open-Source License. Feel free to use and adapt for academic and educational projects.
