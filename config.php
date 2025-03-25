<?php
// config.php - Configuration de la base de données
$host = 'localhost';
$dbname = 'sport_social_network';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Ajouter une activité sportive
function addActivity($user_id, $sport_type, $distance, $duration, $avg_heart_rate)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO activities (user_id, sport_type, distance, duration, avg_heart_rate) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$user_id, $sport_type, $distance, $duration, $avg_heart_rate]);
}

// Modifier une activité sportive
function updateActivity($activity_id, $sport_type, $distance, $duration, $avg_heart_rate)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE activities SET sport_type = ?, distance = ?, duration = ?, avg_heart_rate = ? WHERE id = ?");
    return $stmt->execute([$sport_type, $distance, $duration, $avg_heart_rate, $activity_id]);
}

// Supprimer une activité
function deleteActivity($activity_id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM activities WHERE id = ?");
    return $stmt->execute([$activity_id]);
}

// Affichage des activités
function getActivities()
{
    global $pdo;
    $stmt = $pdo->query("SELECT a.*, u.username FROM activities a JOIN users u ON a.user_id = u.id ORDER BY a.created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>