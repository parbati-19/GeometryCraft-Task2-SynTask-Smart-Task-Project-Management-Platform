# GeometryCraft-Task2-SynTask-Smart-Task-Project-Management-Platform
# 📝 SynTask – Task & Project Management Web App

SynTask is a clean and responsive web-based Task & Project Management System built with **Laravel 12**, **Blade**, **Tailwind CSS**, and **MySQL**. It allows users to manage projects and tasks efficiently, track progress, and maintain their profiles with secure authentication features including social login and 2FA.

---

## 📌 Features

### 🔐 Authentication System
- ✅ User Registration, Login, and Logout
- 🔒 Forgot Password & Reset functionality
- 🌐 Social Logins via:
  - Google
  - Facebook
  - GitHub

### 👤 Profile Settings
- 🖼️ Upload/Change Profile Photo
- 📧 Update Email Address
- 🔑 Change Password
- 🔐 Enable/Disable Two-Factor Authentication

### 📊 Dashboard
- 📁 Projects:
  - Create, View, Edit, Delete Projects
  - List all user-specific projects
- ✅ Tasks:
  - CRUD for tasks under specific projects under authenticated user
  - Filter by status: `Not-Started`, `Active`, `In_progress`, `Complete`
  - Sort by deadline, category (Work/Personal), etc.
- 📌 Task Fields:
  - Title, Description, Due Date
  - Category: `Work`, `Personal`
  - Status: `Not-Started`, `Active`, `In_progress`, `Complete`

### 📈 Progress Report System
- 📅 Overview of all tasks
- 📊 Status-wise task summaries
- 🔎 Filter by project, status, or date range

### 📱 Responsive Design
- Fully responsive across devices (mobile, tablet, desktop)
- Clean UI powered by Tailwind CSS

---

## 🛠️ Tech Stack

| Technology | Usage |
|------------|--------|
| ⚙️ Laravel 12 | Backend framework |
| 🎨 Blade | Templating engine |
| 💅 Tailwind CSS | UI design |
| 🗃️ MySQL | Database |
| 🔐 Manual Authentication
| 🌍 Laravel Socialite | OAuth login (Google, Facebook, GitHub) |

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- MySQL / MariaDB
- Node.js & npm

### Installation

```bash
git clone https://github.com/YourUsername/GeometryCraft-Task2-SynTask-Smart-Task-Project-Management-Platform.git
cd GeometryCraft-Task2-SynTask-Smart-Task-Project-Management-Platform
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
