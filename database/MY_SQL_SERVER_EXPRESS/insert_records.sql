-- insert sample data into SSMS
USE vehiclerentalsystem;

INSERT INTO Customers (user_id, first_name, last_name, date_of_birth, gender, nic_number, licence_number, address, mobile, email)
VALUES
('CS001', 'John', 'Doe', '1990-05-14', 'M', 'NIC123456789', 'LIC12345', '123 Elm Street', '0123456789', 'john.doe@example.com'),
('CS002', 'Jane', 'Smith', '1985-08-25', 'F', 'NIC987654321', 'LIC54321', '456 Oak Street', '0987654321', 'jane.smith@example.com'),
('CS003', 'Mike', 'Johnson', '1992-12-17', 'M', 'NIC123123123', 'LIC123123', '789 Pine Street', '0112233445', 'mike.johnson@example.com'),
('CS004', 'Anna', 'Taylor', '1988-04-11', 'F', 'NIC456456456', 'LIC456456', '123 Maple Street', '0223344556', 'anna.taylor@example.com'),
('CS005', 'David', 'Brown', '1995-07-29', 'M', 'NIC789789789', 'LIC789789', '456 Cedar Street', '0334455667', 'david.brown@example.com'),
('CS006', 'Emma', 'Wilson', '1993-09-05', 'F', 'NIC111222333', 'LIC987654', '789 Birch Street', '0445566778', 'emma.wilson@example.com');

INSERT INTO Drivers (user_id, first_name, last_name, date_of_birth, gender, nic_number, licence_number, address, mobile, email)
VALUES
('DR001', 'James', 'Miller', '1987-03-20', 'M', 'NIC444555666', 'LIC000111', '135 Elm Street', '0556677889', 'james.miller@example.com'),
('DR002', 'Sophia', 'Davis', '1991-11-13', 'F', 'NIC333222111', 'LIC111222', '246 Oak Street', '0667788990', 'sophia.davis@example.com'),
('DR003', 'Ethan', 'Moore', '1983-07-25', 'M', 'NIC654321987', 'LIC987654', '357 Pine Street', '0778899001', 'ethan.moore@example.com'),
('DR004', 'Olivia', 'White', '1996-02-28', 'F', 'NIC987654321', 'LIC123456', '468 Maple Street', '0889900112', 'olivia.white@example.com'),
('DR005', 'Lucas', 'Harris', '1990-10-02', 'M', 'NIC111444777', 'LIC456789', '579 Cedar Street', '0990011223', 'lucas.harris@example.com'),
('DR006', 'Amelia', 'Martin', '1989-06-19', 'F', 'NIC222555888', 'LIC789123', '681 Birch Street', '0112233440', 'amelia.martin@example.com');

INSERT INTO reviews (id, customer_id, review, rate)
VALUES
('RV001', 'CS001', 'The vehicle rental service was excellent. The car was in great condition, and the rental process was smooth and hassle-free.', 5),
('RV002', 'CS002', 'I had a decent experience. The car was fine, but the pickup process took longer than expected.', 4),
('RV003', 'CS003', 'Customer service could use some improvement, but the car was clean and reliable.', 3),
('RV004', 'CS004', 'Great value for money! The rental prices were reasonable, and the vehicle performed perfectly during my trip.', 5),
('RV005', 'CS005', 'The car had some minor issues, but overall, it was a convenient rental experience. Would recommend.', 4),
('RV006', 'CS006', 'Very poor experience. The car was not cleaned properly, and the return process was confusing.', 2);
