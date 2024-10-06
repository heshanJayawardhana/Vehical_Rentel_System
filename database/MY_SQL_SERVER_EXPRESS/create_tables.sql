-- below sql codes for ISDM session which is running on microsoft sql server express
USE vehiclerentalsystem;

CREATE TABLE Customers (
    customer_id VARCHAR(5) PRIMARY KEY, -- CSXXX
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender CHAR(1) CHECK (gender IN ('M', 'F')) NOT NULL, -- 'M' for male, 'F' for female
    nic_number VARCHAR(20) NOT NULL,
    address VARCHAR(MAX) NOT NULL, -- Use NVARCHAR(MAX) for large text fields
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Drivers (
    driver_id VARCHAR(5) PRIMARY KEY, -- DRXXX
    licence_number VARCHAR(20) NOT NULL,
    staff_id VARCHAR(5),

	FOREIGN KEY (staff_id) REFERENCES Staff(staff_id) -- Define foreign key constraint
);

CREATE TABLE Customer_Contact_No(
	customer_id VARCHAR(5),
	contact_No VARCHAR(15),

	FOREIGN KEY (customer_id) REFERENCES Customers(customer_id) -- Define foreign key constraint
);

CREATE TABLE Staff_Tele_No(
	staff_id VARCHAR(6),
	telephone_No VARCHAR(15),

	FOREIGN KEY (staff_id) REFERENCES Staff(staff_id) -- Define foreign key constraint
);


CREATE TABLE Reservation_Driver(
	Reservation_id VARCHAR(10),
	driver_id VARCHAR(5),

	FOREIGN KEY (staff_id) REFERENCES Staff(staff_id) -- Define foreign key constraint
	FOREIGN KEY (Reservation_id) REFERENCES Reservations(Reservation_ID) -- Define foreign key constraint
);

INSERT INTO Customers (customer_id, first_name, last_name, date_of_birth, gender, nic_number, address, email)
VALUES
('CS001', 'John', 'Doe', '1985-01-15', 'M', 'NIC12345A', '123 Main St, City', 'john.doe@example.com'),
('CS002', 'Jane', 'Smith', '1990-05-25', 'F', 'NIC67890B', '456 Oak St, City', 'jane.smith@example.com'),
('CS003', 'Michael', 'Johnson', '1988-03-12', 'M', 'NIC23456C', '789 Pine St, City', 'michael.johnson@example.com'),
('CS004', 'Emily', 'Davis', '1992-11-05', 'F', 'NIC78901D', '321 Cedar St, City', 'emily.davis@example.com'),
('CS005', 'David', 'Brown', '1987-07-22', 'M', 'NIC34567E', '654 Birch St, City', 'david.brown@example.com');

INSERT INTO Drivers (driver_id, licence_number, staff_id)
VALUES
('DR001', 'LIC98765A', 'ST001'),
('DR002', 'LIC65432B', 'ST002'),
('DR003', 'LIC32109C', 'ST003'),
('DR004', 'LIC45678D', 'ST004'),
('DR005', 'LIC12345E', 'ST005');

INSERT INTO Customer_Contact_No (customer_id, contact_No)
VALUES
('CS001', '+1234567890'),
('CS002', '+1987654321'),
('CS003', '+1122334455'),
('CS004', '+1223344556'),
('CS005', '+1445566778');

INSERT INTO Staff_Tele_No (staff_id, telephone_No)
VALUES
('S001', '+1777888999'),
('S002', '+1666777888'),
('S003', '+1555666777'),
('S004', '+1444555666'),
('S005', '+1333444555');

INSERT INTO Reservation_Driver (Reservation_id, driver_id)
VALUES
('RES001', 'DR001'),
('RES002', 'DR002'),
('RES003', 'DR003'),
('RES004', 'DR004'),
('RES005', 'DR005');
