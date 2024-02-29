-- 00_schema.sql
USE db_name;

-- Create parking_spaces table
CREATE TABLE parking_spaces (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create cameras table
CREATE TABLE cameras (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    direction VARCHAR(50) NOT NULL,
    parking_space_id INT(6) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (parking_space_id) REFERENCES parking_spaces(id)
);

-- Create recognitions table
CREATE TABLE recognitions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plate VARCHAR(20) NOT NULL,
    direction VARCHAR(10) NOT NULL,
    camera_id INT(6) UNSIGNED NOT NULL,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (camera_id) REFERENCES cameras(id)
);

-- Create stays table
CREATE TABLE stays (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    entry_recognition_id INT(6) UNSIGNED NOT NULL,
    exit_recognition_id INT(6) UNSIGNED NULL,
    parking_space_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (entry_recognition_id) REFERENCES recognitions(id),
    FOREIGN KEY (exit_recognition_id) REFERENCES recognitions(id),
    FOREIGN KEY (parking_space_id) REFERENCES parking_spaces(id)
);
