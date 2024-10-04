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

-- create customers table
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

-- create drivers table
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

-- create reviews table
CREATE TABLE reviews (
    id VARCHAR(5) PRIMARY KEY, -- RVXXX
    customer_id VARCHAR(5) NOT NULL, -- from 'Customers' table 'user_id' column
    review TEXT NOT NULL,
    rate INT CHECK (rate <= 5), -- Ensure rate is <= 5
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set to current timestamp
    
    FOREIGN KEY (customer_id) REFERENCES Customers(user_id) -- Define foreign key constraint
);

--Create staff table
CREATE TABLE Staff(
    StaffID INT PRIMARY KEY,
    NIC VARCHAR(10),
    Bonus FLOAT,
    FirstName VARCHAR(15),
    LastName VARCHAR(15),
    Age INT,
    Address VARCHAR(50),
    Salary FLOAT,
    DOB DATE
);

-- Inserting data into the Staff table
INSERT INTO Staff (StaffID, NIC, Bonus, FirstName, LastName, Age, Address, Salary, DOB)
VALUES
(1, '993456789V', 1500.50, 'John', 'Doe', 30, '123 Maple Street', 55000.00, '1994-08-15'),
(2, '985123456V', 1200.75, 'Alice', 'Smith', 27, '456 Oak Avenue', 52000.00, '1996-03-20'),
(3, '973214567V', 1750.00, 'Bob', 'Johnson', 40, '789 Pine Road', 60000.00, '1983-11-05'),
(4, '963987654V', 1600.25, 'Eve', 'Williams', 35, '321 Birch Lane', 58000.00, '1988-06-25'),
(5, '943456321V', 1450.00, 'Charlie', 'Brown', 28, '987 Cedar Blvd', 53000.00, '1995-01-10');

--Create contact_form table
CREATE TABLE contact_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--Create payment table
CREATE TABLE payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(100),
    method ENUM('card-payment', 'cash-payment'),
    creditCardNum VARCHAR(16),
    date VARCHAR(5),
    cvv VARCHAR(3),
    receipt VARCHAR(255),
    totalPrice DECIMAL(10, 2),
    confirmed BOOLEAN DEFAULT 0
);

CREATE TABLE Branch(
    BranchID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(100),
    Address VARCHAR(100),
    Location VARCHAR(50)
    );

CREATE TABLE reservation (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,    -- Unique booking ID for each reservation
    vehicleID INT(4),                            -- Stores the vehicle number or ID
    ContactNo VARCHAR(20),                       -- Contact number including country code (+94xxxxxxx)
    Destination_Purpose VARCHAR(255),            -- Purpose of the trip or destination
    RentalStratDate_Time DATETIME,               -- Start date and time of the rental
    RentalEndDate_Time DATETIME,                 -- End date and time of the rental
    NoOfMembers INT,                             -- Number of members for the trip
    AdditionalNote TEXT,                         -- Additional notes for the reservation
    NeedaDriver TEXT                             -- Indicates whether a driver is needed (stored as text, length 3)
);
INSERT INTO Branch (BranchID, Email, Address, Location)
VALUES
(1, 'colombo.branch@easyride.com', '123 Main Street, Colombo 01', 'Colombo'),
(2, 'kandy.branch@easyride.com', '456 Temple Road, Kandy', 'Kandy'),
(3, 'galle.branch@easyride.com', '789 Lighthouse Avenue, Galle', 'Galle'),
(4, 'negombo.branch@easyride.com', '321 Beachside Drive, Negombo', 'Negombo'),
(5, 'jaffna.branch@easyride.com', '654 Unity Lane, Jaffna', 'Jaffna');

    
CREATE TABLE BranchContact(
    BranchID INT,
    Telno VARCHAR (15),
    PRIMARY KEY(BranchID,Telno),
    FOREIGN KEY(BranchID) REFERENCES Branch(BranchID)
    );
CREATE TABLE RentalAgent(
    AgentID INT PRIMARY KEY,
    StaffID INT,
    FOREIGN KEY(StaffID) REFERENCES Staff(StaffID)
);

INSERT INTO RentalAgent (AgentID, StaffID)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


CREATE TABLE Rental(
    RentalID INT PRIMARY KEY,
    ReservationID INT,
    AgentID INT,
    JourneyStatus VARCHAR(20),
    FOREIGN KEY(ReservationID) REFERENCES Reservation(ReservationID),
    FOREIGN KEY(AgentID) REFERENCES RentalAgent(AgentID)
);

INSERT INTO Rental (RentalID, ReservationID, AgentID, JourneyStatus)
VALUES
(1, 1, 1, 'Completed'),
(2, 2, 2, 'In Progress'),
(3, 3, 3, 'Pending'),
(4, 4, 4, 'Cancelled'),
(5, 5, 5, 'Completed');

CREATE TABLE Vehicle(
	   vehicleID INT(4) AUTO_INCREMENT PRIMARY KEY,
	   year DATE(4),
	   brand VARCHAR(20),
	   type VARCHAR(20),
	   vehicleNo INT(10),
);


## Step 6: Exit
1. After setting everything up, you can log out from phpMyAdmin.
2. Stop the MySQL and Apache services if you are done working with your database.

---
