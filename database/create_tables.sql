-- create tables here ..

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
