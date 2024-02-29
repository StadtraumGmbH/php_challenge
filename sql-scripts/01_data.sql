-- 01_data.sql
USE db_name;

-- Insert data into parking_spaces table
INSERT INTO parking_spaces (city, state) VALUES
    ('Düsseldorf', 'NRW'),
    ('Berlin', 'Berlin');

-- Insert data into cameras table
INSERT INTO cameras (name, position, direction, parking_space_id) VALUES
    ('Camera 1', 'Gate A', 'Front', 1),
    ('Camera 2', 'Gate A', 'Back', 1),
    ('Camera 3', 'Gate A', 'Front', 2),
    ('Camera 4', 'Gate A', 'Back', 2),
    ('Camera 5', 'Gate B', 'Front', 2),
    ('Camera 6', 'Gate B', 'Back', 2);

-- Insert data into recognitions table
INSERT INTO recognitions (plate, direction, camera_id) VALUES
    ('ABC123', 'Entrance', 1),
    ('XYZ789', 'Entrance', 3),
    ('ABC123', 'Exit', 2),
    ('XYZ789', 'Exit', 6),
    ('JKL012', 'Entrance', 4);

-- Insert data into stays table
INSERT INTO stays (entry_recognition_id, exit_recognition_id, parking_space_id) VALUES
    (1, 3, 1),        -- Entry and exit for parking space 1
    (2, 4, 2),        -- Entry and exit for parking space 2
    (5, NULL, 2);     -- Entry for parking space 2
