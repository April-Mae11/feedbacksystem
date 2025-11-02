# Feedback Management System (PHP + MySQL)

## 📖 Overview
A simple web-based system for collecting and managing feedback.  
Users can submit feedback, and admins can view and delete them in the dashboard.

## 🧩 Features
- Submit feedback with name, email, and message  
- View all feedbacks in admin dashboard  
- Delete unwanted feedbacks  
- Simple, clean interface  

## ⚙️ Requirements
- PHP 7.4 or higher  
- MySQL Database  
- XAMPP or WAMP Server  

## 🛠️ Setup Instructions
1. Clone or download the project.
2. Move the folder to your `htdocs` directory (e.g. `C:/xampp/htdocs/feedback-system`).
3. Import the database:
   - Open **phpMyAdmin**
   - Create a new database named `feedback_db`
   - Import the file `feedback.sql`
4. Update `config/db_connect.php` if needed.
5. Run the project in browser:
