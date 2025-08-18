# Service Booking System API (Laravel)

A **basic API-based & Admin-managed service booking system** built with Laravel.  
This system allows **customers** to register, view services, and make bookings. **Admins** can manage services and view all bookings.

---

## Table of Contents

- [Features](#features)  
- [Tech Stack](#tech-stack)  
- [Installation & Setup](#installation--setup)  
- [Database & Models](#database--models)  
- [API Endpoints](#api-endpoints)  
- [Authentication](#authentication)  
- [Sample Requests & Responses](#sample-requests--responses)  
- [Screenshots](#screenshots)  
- [License](#license)  

---

## Features

**Admin Features:**
- Login as Admin
- List of customers, edit and delete
- Create, update, and delete services
- View all and status update bookings

**Customer Features:**
- Register and login
- View available services
- Book services
- View own bookings

**Other:**
- Token-based authentication (Laravel Sanctum)
- Role-based access control (Admin vs Customer)

---

## Tech Stack

- **PHP**: 8.2.x
- **Backend:** Laravel 10x
- **Frontend**: Blade templates (Bootstra 5 or Javascript/jQuery if applicable)
- **Authentication:** Laravel Sanctum and UI Auth 
- **Database:** MySQL 
- **API Testing:** Postman  
- **Deployment**: Localhost or any hosting platform supporting PHP and Laravel 

---

## Installation & Setup

1. Clone the repository:

   ```bash
    git clone https://github.com/sujonmia019/Simple-Booking-System

2. Navigate to the project directory

    ```bash
    cd Simple-Booking-System

3. Install dependencies using Composer

    ```bash
    composer install

4. Copy the .env.example file to .env

    ```bash
    cp .env.example .env

5. Generate the application key

    ```bash
    php artisan key:generate

6. Set up your database connection in the .env file

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

7. Run the migrations with user seeding

    ```bash
    php artisan migrate:fresh --seed

8. Run the migrations without seeding

    ```bash
    php artisan migrate

9. Start the development server

    ```bash
    php artisan serve
