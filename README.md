# Service Booking System API (Laravel)

A **basic API-based & Admin-managed service booking system** built with Laravel.  
This system allows **customers** to register, view services, and make bookings. **Admins** can manage services and view all bookings.

---

## Table of Contents

- [Features](#features)  
- [Tech Stack](#tech-stack)  
- [Installation & Setup](#installation--setup)
- [API Endpoints](#api-endpoints)  
- [Screenshots](#screenshots)   

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

4. Node js packase install

    ```bash
    npm install

5. Copy the .env.example file to .env

    ```bash
    cp .env.example .env

6. Generate the application key

    ```bash
    php artisan key:generate

7. Set up your database connection in the .env file

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

8. Run the migrations with user seeding

    ```bash
    php artisan migrate:fresh --seed

9. Run the migrations without seeding

    ```bash
    php artisan migrate

10. Start the development server

    ```bash
    php artisan serve

## Database
Database Design Schema <a href="" target="_blank">Click</a>

#### Open Postman
Download or browser login and install Postman if you don’t already have it.

## API Endpoints

### Public Endpoints
| Method | Endpoint        | Description              |
|--------|-----------------|--------------------------|
| POST   | `/api/register` | Register a new customer  |
| POST   | `/api/login`    | Login (Customer/Admin)   |
| POST   | `/api/v1/logout`| Logout (Customer/Admin)   |

---

### Customer Endpoints (Authenticated)
| Method | Endpoint         | Description                     |
|--------|------------------|---------------------------------|
| GET    | `/api/v1/customer/services`  | List all available services     |
| POST   | `/api/v1/customer/bookings`  | Book a service                  |
| GET    | `/api/v1/customer/bookings`  | List logged-in user's bookings  |

---

### Admin Endpoints (Authenticated)
| Method | Endpoint               | Description               |
|--------|------------------------|---------------------------|
| POST   | `/api/v1/admin/services`        | Create a new service      |
| PUT    | `/api/v1/admin/services/{id}`   | Update service details    |
| DELETE | `/api/v1/admin/services/{id}`   | Delete a service          |
| GET    | `/api/v1/admin/bookings`  | List all customer bookings|

