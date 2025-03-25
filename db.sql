-- Création de la base de données
CREATE DATABASE IF NOT EXISTS sport_social_network;
USE sport_social_network;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des activités sportives
CREATE TABLE IF NOT EXISTS activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    sport_type ENUM('running', 'swimming', 'cycling') NOT NULL,
    distance FLOAT,
    duration TIME,
    avg_heart_rate INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des interactions (likes & commentaires)
CREATE TABLE IF NOT EXISTS interactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    activity_id INT NOT NULL,
    type ENUM('like', 'comment') NOT NULL,
    comment_text TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE
);

-- Table des abonnements (followers)
CREATE TABLE IF NOT EXISTS followers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    follower_id INT NOT NULL,
    following_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (following_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insertion de quelques utilisateurs (exemple)
INSERT INTO users (username, email) VALUES
('Alice', 'alice@example.com'),
('Bob', 'bob@example.com');

-- Insertion de quelques activités (exemple)
INSERT INTO activities (user_id, sport_type, distance, duration, avg_heart_rate) VALUES
(1, 'running', 5.2, '00:30:00', 140),
(2, 'cycling', 20.5, '01:15:00', 130);

-- Insertion de quelques interactions (likes & commentaires)
INSERT INTO interactions (user_id, activity_id, type, comment_text) VALUES
(2, 1, 'like', NULL),
(1, 2, 'comment', 'Belle performance !');

-- Insertion d’un suivi entre utilisateurs
INSERT INTO followers (follower_id, following_id) VALUES
(1, 2);
