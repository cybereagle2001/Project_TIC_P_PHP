-- 🏋️‍♂️ Welcome to the GYM Database Migration Script! 🏋️‍♀️
-- 🚀 Please copy and paste this SQL script into your MySQL client to create the GYM database and its tables. 🚀
-- 🛠️ This will set up the necessary tables for your GYM project. 🛠️

-- 🗄️ Create the database if it does not exist
CREATE DATABASE IF NOT EXISTS GYM;

-- 🔄 Use the GYM database
USE GYM;

-- 🏢 Create the club table
-- 📋 The club table stores information about each gym location.
-- Attributes:
--  - id_club: Unique identifier for each club (Primary Key)
--  - nom_club: Name of the club
--  - adresse: Address of the club
--  - numero_tel: Contact phone number of the club
--  - heure_ouverture: Opening time of the club
--  - heure_fermeture: Closing time of the club
--  - created_at: Timestamp when the record was created
CREATE TABLE IF NOT EXISTS club (
    id_club INT AUTO_INCREMENT PRIMARY KEY,
    nom_club VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    numero_tel VARCHAR(20) NOT NULL,
    heure_ouverture TIME,
    heure_fermeture TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 🏬 Create the salle table
-- 📋 The salle table stores information about different rooms or areas within a club.
-- Attributes:
--  - id_salle: Unique identifier for each salle (Primary Key)
--  - nom_salle: Name of the salle
--  - capacity: Capacity of the salle
--  - type: Type of salle (rpm, piscine, cours, cross_fit)
--  - id_club: Foreign key linking to the club table
-- Relationships:
--  - Each salle belongs to one club.
CREATE TABLE IF NOT EXISTS salle (
    id_salle INT AUTO_INCREMENT PRIMARY KEY,
    nom_salle VARCHAR(255) NOT NULL,
    capacity INT NOT NULL,
    type ENUM('rpm', 'piscine', 'cours', 'cross_fit') NOT NULL,
    id_club INT,
    FOREIGN KEY (id_club) REFERENCES club(id_club)
);

-- 📚 Create the cours table
-- 📋 The cours table stores information about different courses offered at the gym.
-- Attributes:
--  - id_cours: Unique identifier for each cours (Primary Key)
--  - nom_cours: Name of the cours
--  - duration: Duration of the cours in minutes
--  - type: Type of cours (rpm, piscine, cours, cross_fit)
CREATE TABLE IF NOT EXISTS cours (
    id_cours INT AUTO_INCREMENT PRIMARY KEY,
    nom_cours VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    type ENUM('rpm', 'piscine', 'cours', 'cross_fit') NOT NULL
);

-- 🧑‍🏫 Create the coach table
-- 📋 The coach table stores information about the coaches working at the gym.
-- Attributes:
--  - id: Unique identifier for each coach (Primary Key)
--  - nom: Last name of the coach
--  - prenom: First name of the coach
--  - prix_cours: Hourly pay rate for the coach
CREATE TABLE IF NOT EXISTS coach (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    prix_cours DECIMAL(10, 2) NOT NULL
);

-- 📅 Create the crenaux join table
-- 📋 The crenaux table stores information about the scheduling of courses, coaches, and salles.
-- Attributes:
--  - id_crenaux: Unique identifier for each crenaux (Primary Key)
--  - id_coach: Foreign key linking to the coach table
--  - id_cours: Foreign key linking to the cours table
--  - id_salle: Foreign key linking to the salle table
--  - start_time: Start time of the scheduled cours
--  - duration: Duration of the scheduled cours in minutes
-- Relationships:
--  - Each crenaux links a coach, cours, and salle to a specific time.
CREATE TABLE IF NOT EXISTS crenaux (
    id_crenaux INT AUTO_INCREMENT PRIMARY KEY,
    id_coach INT,
    id_cours INT,
    id_salle INT,
    start_time DATETIME NOT NULL,
    duration INT NOT NULL,
    FOREIGN KEY (id_coach) REFERENCES coach(id),
    FOREIGN KEY (id_cours) REFERENCES cours(id_cours),
    FOREIGN KEY (id_salle) REFERENCES salle(id_salle)
);

-- 🎉 Your GYM database is now set up and ready to use! 🎉



-- Insert sample data into the club table
INSERT INTO club (nom_club, adresse, numero_tel, heure_ouverture, heure_fermeture) VALUES
('Fitness World', '123 Main St', '123-456-7890', '06:00:00', '22:00:00'),
('Gym Pro', '456 Elm St', '234-567-8901', '07:00:00', '23:00:00'),
('Health Hub', '789 Oak St', '345-678-9012', '05:00:00', '21:00:00'),
('Workout Zone', '101 Pine St', '456-789-0123', '08:00:00', '20:00:00'),
('Active Life', '202 Cedar St', '567-890-1234', '06:00:00', '22:00:00'),
('Fitness First', '303 Birch St', '678-901-2345', '06:00:00', '22:00:00'),
('Total Fitness', '404 Maple St', '789-012-3456', '05:30:00', '22:30:00'),
('Ultimate Gym', '505 Walnut St', '890-123-4567', '07:00:00', '23:00:00');

-- Insert sample data into the salle table
INSERT INTO salle (nom_salle, capacity, type, id_club) VALUES
('RPM Room', 20, 'rpm', 1),
('Pool Area', 50, 'piscine', 1),
('Yoga Studio', 30, 'cours', 2),
('CrossFit Box', 25, 'cross_fit', 2),
('Spinning Room', 20, 'rpm', 3),
('Swimming Pool', 50, 'piscine', 3),
('Aerobics Hall', 40, 'cours', 4),
('CrossFit Zone', 25, 'cross_fit', 4);

-- Insert sample data into the cours table
INSERT INTO cours (nom_cours, duration, type) VALUES
('RPM Beginners', 60, 'rpm'),
('Advanced RPM', 45, 'rpm'),
('Aqua Aerobics', 60, 'piscine'),
('Swimming Lessons', 45, 'piscine'),
('Yoga Basics', 60, 'cours'),
('Power Yoga', 75, 'cours'),
('CrossFit Intro', 60, 'cross_fit'),
('Advanced CrossFit', 90, 'cross_fit');

-- Insert sample data into the coach table
INSERT INTO coach (nom, prenom, prix_cours) VALUES
('Smith', 'John', 50.00),
('Doe', 'Jane', 55.00),
('Brown', 'Charlie', 60.00),
('Johnson', 'Chris', 65.00),
('Miller', 'Pat', 70.00),
('Davis', 'Alex', 75.00),
('Wilson', 'Taylor', 80.00),
('Moore', 'Morgan', 85.00);

-- Insert sample data into the crenaux table
INSERT INTO crenaux (id_coach, id_cours, id_salle, start_time, duration) VALUES
(1, 1, 1, '2024-07-07 09:00:00', 60),
(2, 2, 1, '2024-07-07 11:00:00', 45),
(3, 3, 2, '2024-07-07 08:00:00', 60),
(4, 4, 2, '2024-07-07 10:00:00', 45),
(5, 5, 3, '2024-07-07 07:00:00', 60),
(6, 6, 3, '2024-07-07 09:00:00', 75),
(7, 7, 4, '2024-07-07 06:00:00', 60),
(8, 8, 4, '2024-07-07 08:00:00', 90);
