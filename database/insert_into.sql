INSERT INTO Customers (user_id, first_name, last_name, date_of_birth, gender, nic_number, licence_number, address, mobile, email, nic_pdf, profile_image, password)
VALUES
('CS001', 'John', 'Doe', '1985-05-15', 'male', 'NIC123456', 'LIC789012', '123 Elm St, Springfield, IL', '5551234567', 'john.doe@example.com', '../documents/customers/nic_pdf/CS001_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS001_profile_picture.jpg', '$2y$10$abcd1234hashedpassword'),
('CS002', 'Jane', 'Smith', '1990-08-20', 'female', 'NIC654321', 'LIC210987', '456 Oak St, Springfield, IL', '5552345678', 'jane.smith@example.com', '../documents/customers/nic_pdf/CS002_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS002_profile_picture.jpg', '$2y$10$efgh5678hashedpassword'),
('CS003', 'Alice', 'Johnson', '1988-03-12', 'female', 'NIC987654', 'LIC543210', '789 Pine St, Springfield, IL', '5553456789', 'alice.johnson@example.com', '../documents/customers/nic_pdf/CS003_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS003_profile_picture.jpg', '$2y$10$ijkl9101hashedpassword'),
('CS004', 'Bob', 'Brown', '1995-12-05', 'male', 'NIC123789', 'LIC321654', '321 Maple St, Springfield, IL', '5554567890', 'bob.brown@example.com', '../documents/customers/nic_pdf/CS004_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS004_profile_picture.jpg', '$2y$10$mnop1234hashedpassword'),
('CS005', 'Charlie', 'Davis', '1978-07-30', 'male', 'NIC456123', 'LIC987321', '654 Cedar St, Springfield, IL', '5555678901', 'charlie.davis@example.com', '../documents/customers/nic_pdf/CS005_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS005_profile_picture.jpg', '$2y$10$qrst5678hashedpassword'),
('CS006', 'Eve', 'Wilson', '1992-11-10', 'female', 'NIC789456', 'LIC123456', '987 Birch St, Springfield, IL', '5556789012', 'eve.wilson@example.com', '../documents/customers/nic_pdf/CS006_nic_scan_pdf.pdf', '../documents/customers/profile_pic/CS006_profile_picture.jpg', '$2y$10$uvwx9101hashedpassword');


INSERT INTO `vehicle` (`vehicleID`, `year`, `brand`, `vehicle_img`, `features`, `type`, `charge_rate`, `vehicleNo`) VALUES
(1, '2020', 'Toyota', '../documents/vehicles/toyota_camry.avif', 'Air Conditioning, Bluetooth, GPS', 'Sedan', '3500', 'AB1234'),
(2, '2019', 'Honda', '../documents/vehicles/honda_civic.avif', 'Air Conditioning, Bluetooth, Backup Camera', 'Sedan', '3000', 'CD5678'),
(3, '2021', 'Nissan', '../documents/vehicles/nissan_sentra.jpeg', 'Air Conditioning, Automatic, Bluetooth', 'Sedan', '4000', 'EF9012'),
(4, '2020', 'Hyundai', '../documents/vehicles/hyundai_tucson.avif', 'AWD, Air Conditioning, GPS', 'SUV', '5000', 'GH3456'),
(5, '2021', 'Toyota', '../documents/vehicles/toyota_rav4.avif', 'AWD, Bluetooth, Sunroof', 'SUV', '6000', 'IJ7890'),
(6, '2019', 'Ford', '../documents/vehicles/Ford_Escape-v5.webp', 'Air Conditioning, Bluetooth, GPS', 'SUV', '5500', 'KL1234'),
(7, '2022', 'Mercedes-Benz', '../documents/vehicles/Mercedes-Benz.avif', 'Air Conditioning, 12 Seats, GPS', 'Van', '8000', 'MN5678'),
(8, '2020', 'Ford', '../documents/vehicles/ford_transit.webp', 'Air Conditioning, 15 Seats, Bluetooth', 'Van', '7500', 'OP9012'),
(9, '2021', 'Toyota', '../documents/vehicles/toyota_hiace.webp', 'Air Conditioning, 10 Seats, Backup Camera', 'Van', '7200', 'QR3456'),
(10, '2021', 'Honda', '../documents/vehicles/honda_crv.avif', 'AWD, Air Conditioning, Bluetooth', 'SUV', '5200', 'ST7890'),
(11, '2018', 'Kia', '../documents/vehicles/kia_optima.avif', 'Air Conditioning, Leather Seats, Bluetooth', 'Sedan', '2900', 'UV1234'),
(12, '2022', 'Jeep', '../documents/vehicles/jeep_compass.avif', 'AWD, Air Conditioning, Navigation', 'SUV', '5800', 'WX5678'),
(13, '2020', 'Volkswagen', '../documents/vehicles/vw_transporter.webp', 'Air Conditioning, 9 Seats, Bluetooth', 'Van', '7000', 'YZ9012');


