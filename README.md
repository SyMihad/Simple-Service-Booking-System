
# 🛠️ Service Booking API – Laravel

This is a simple API-based Service Booking System built with **Laravel 10**, using **Sanctum** for authentication. The system supports user registration, login, viewing available services, booking services, and admin service management.

---

## 🚀 Features

- ✅ Customer registration & login
- ✅ Admin login (role-based)
- ✅ Token-based authentication with Laravel Sanctum
- ✅ View available services
- ✅ Book services (customer only)
- ✅ Admin: create, update, delete services
- ✅ Admin: view all bookings
- ✅ Request validation
- ✅ Booking date must not be in the past
- ✅ Seeder with sample data
- ✅ Organized RESTful API structure

---

## 🔐 Admin Credentials (Seeded)

```
Email: admin@gmail.com  
Password: 123456
```

---

## 🛠️ Installation & Setup

```bash
git clone https://github.com/SyMihad/Simple-Service-Booking-System.git
cd Simple-Service-Booking-System

# Install dependencies
composer install

# Setup .env
cp .env.example .env
php artisan key:generate

# Setup database (configure DB in .env)
php artisan migrate --seed

# Start server
php artisan serve
```

---

## 🔗 API Endpoints Summary

### Auth
- `POST /api/register` – Customer registration
- `POST /api/login` – Login (customer/admin)
- `POST /api/logout` – Logout

### Customer (Requires Token)
- `GET /api/services` – List services
- `POST /api/bookings` – Book a service
- `GET /api/bookings` – View your bookings

### Admin (Requires Admin Token)
- `POST /api/services` – Create new service
- `PUT /api/services/{id}` – Update service
- `DELETE /api/services/{id}` – Delete service
- `GET /api/admin/bookings` – View all bookings

---

## 🧪 API Testing – Postman Collection

You can import and test all endpoints using the provided Postman collection file:

📂 File: `Service Booking System.postman_collection.json` (in project root)

### ➕ To Import in Postman:
1. Open Postman.
2. Click **"Import"**.
3. Upload the `Service Booking System.postman_collection.json` file.
4. Test the API endpoints with proper headers:
   - `Accept: application/json`
   - `Authorization: Bearer {token}` for protected routes
