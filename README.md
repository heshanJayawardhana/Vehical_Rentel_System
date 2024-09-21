# Vehicle Rental System - MySQL Setup Guide

## Prerequisites
- Ensure you have XAMPP installed on your system.
- Start the Apache and MySQL services from the XAMPP Control Panel.

## Step 1: Access phpMyAdmin
1. Open your web browser.
2. Navigate to `http://localhost/phpmyadmin`.

## Step 2: Create the Database
1. In phpMyAdmin, look for the "Databases" tab.
2. Enter the name `vehiclerentalsystem` in the "Create database" field.
3. Click the "Create" button.

### SQL Command
You can also execute the following SQL command directly in phpMyAdmin’s SQL tab:
```sql
CREATE DATABASE vehiclerentalsystem;
```

## Step 3: Create the User
To create a new user `rentalsystem` with the password `iwt2024`, execute the following commands:

### SQL Commands
1. Switch to the SQL tab in phpMyAdmin.
2. Run the following commands:
```sql
CREATE USER 'rentalsystem'@'localhost' IDENTIFIED BY 'iwt2024';

GRANT ALL PRIVILEGES ON vehiclerentalsystem.* TO 'rentalsystem'@'localhost';

FLUSH PRIVILEGES;
```

## Step 4: Verify User Creation
To verify that the user was created successfully:
1. Go to the "User accounts" tab in phpMyAdmin.
2. You should see `rentalsystem` listed as a user with appropriate privileges.

## Step 5: Create Tables (Optional)
If you want to create some tables for your vehicle rental system, you can execute the following SQL commands:

### SQL Commands for Tables
```sql
USE vehiclerentalsystem;

CREATE TABLE Customers (
    user_id VARCHAR(5) PRIMARY KEY, -- CSXXX
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    nic_number VARCHAR(20) NOT NULL,
    licence_number VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    mobile VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nic_pdf VARCHAR(255), -- File path or name for NIC scan
    profile_image VARCHAR(255), -- File path or name for profile picture
    password VARCHAR(255) NOT NULL, -- For storing hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Drivers (
    user_id VARCHAR(5) PRIMARY KEY, -- DRXXX
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    nic_number VARCHAR(20) NOT NULL,
    licence_number VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nic_pdf VARCHAR(255) NOT NULL, -- File path or name for NIC scan
    licence_pdf VARCHAR(255) NOT NULL, -- File path or name for Licence scan
    profile_image VARCHAR(255) NOT NULL, -- File path or name for profile picture
    password VARCHAR(255) NOT NULL, -- For storing hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



```

## Step 6: Exit
1. After setting everything up, you can log out from phpMyAdmin.
2. Stop the MySQL and Apache services if you are done working with your database.

---