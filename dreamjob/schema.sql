CREATE DATABASE IF NOT EXISTS dreamjob;

USE dreamjob;

CREATE TABLE IF NOT EXISTS software_engineers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15),
    hire_date DATE,
    experience_years INT(3),
    address TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
