-- below sql codes for ISDM session which is running on microsoft sql server express
USE vehiclerentalsystem;

CREATE TABLE Customers (
    user_id NVARCHAR(5) PRIMARY KEY, -- CSXXX
    first_name NVARCHAR(50) NOT NULL,
    last_name NVARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender CHAR(1) CHECK (gender IN ('M', 'F')) NOT NULL, -- 'M' for male, 'F' for female
    nic_number NVARCHAR(20) NOT NULL,
    licence_number NVARCHAR(20) NOT NULL,
    address NVARCHAR(MAX) NOT NULL, -- Use NVARCHAR(MAX) for large text fields
    mobile NVARCHAR(10) NOT NULL,
    email NVARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Drivers (
    user_id NVARCHAR(5) PRIMARY KEY, -- DRXXX
    first_name NVARCHAR(50) NOT NULL,
    last_name NVARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender CHAR(1) CHECK (gender IN ('M', 'F')) NOT NULL, -- 'M' for male, 'F' for female
    nic_number NVARCHAR(20) NOT NULL,
    licence_number NVARCHAR(20) NOT NULL,
    address NVARCHAR(MAX) NOT NULL,
    mobile NVARCHAR(15) NOT NULL,
    email NVARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE reviews (
    id NVARCHAR(5) PRIMARY KEY, -- RVXXX
    customer_id NVARCHAR(5) NOT NULL, -- from 'Customers' table 'user_id' column
    review NVARCHAR(MAX) NOT NULL,
    rate INT CHECK (rate <= 5), -- Ensure rate is <= 5
    created_at DATETIME DEFAULT GETDATE(), -- Automatically set to current timestamp
    
    FOREIGN KEY (customer_id) REFERENCES Customers(user_id) -- Define foreign key constraint
);
