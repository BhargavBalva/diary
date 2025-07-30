# Laravel Notes Application 

This is a simple Laravel-based Notes application built using Laravel 11 and Vite with Bootstrap for styling. The app allows users to create, view, update, delete, and now **export** personal notes as **PDF** files.

---

## ✅ Features

- User Authentication (Login/Registration)
- Create Notes
- View All Notes
- Edit Notes
- Delete Notes
- **Add Mood & Location to Notes** 📝🌍
- **Export Individual Notes as PDF** 📄
- Clean and minimal UI using Bootstrap
- Form validations on both client-side and server-side
- Laravel 11, Vite, and Blade templates

---

## 🛠️ Technologies Used

- Laravel 11
- PHP 8+
- MySQL
- Bootstrap 5
- Vite (Asset bundler)
- Laravel Breeze (Authentication)
- [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf) (for PDF export)

---

## 🧪 Setup Instructions

1. Clone or download the project.
2. Run the following commands:

   ```bash
   composer install
   npm install && npm run dev
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
