CREATE DATABASE IF NOT EXISTS music_db;
USE music_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    lyrics TEXT
);

-- Default admin user (password: admin123)
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$z9yN0s1Bz8WZaZJvXeZsLuK0qZ7TS2wuy7NWUQQOcqkgP.WFgHkX2');
