CREATE DATABASE IF NOT EXISTS GestionVoyage;
USE GestionVoyage;

-- Création de la table des rôles
CREATE TABLE role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(50) NOT NULL
);

-- Création de la table des utilisateurs
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    etat ENUM('actif', 'banni', 'archive') DEFAULT 'actif',
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);

-- Création de la table des activités
CREATE TABLE activite (
    id_activite INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(200) NOT NULL,
    description TEXT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    place_dispo INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL
);

-- Création de la table des réservations
CREATE TABLE reservation (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_user INT NOT NULL,
    id_activite INT NOT NULL,
    statut ENUM('confirmée', 'en attente', 'annulée') DEFAULT 'en attente',
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
);

-- Insertion de données initiales dans la table des rôles
INSERT INTO role (nom_role) VALUES
('Admin'),
('Super Admin'),
('Client'),
('Visiteur');
