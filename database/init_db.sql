CREATE DATABASE vehiclerentalsystem;

CREATE USER 'rentalsystem'@'localhost' IDENTIFIED BY 'iwt2024';

GRANT ALL PRIVILEGES ON vehiclerentalsystem.* TO 'rentalsystem'@'localhost';

FLUSH PRIVILEGES;