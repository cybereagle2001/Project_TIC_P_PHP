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
