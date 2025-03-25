<?php
require 'config.php';
require 'inc/header.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'];
    $sport_type = $_POST['sport_type'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $avg_heart_rate = $_POST['avg_heart_rate'];

    if (function_exists('addActivity')) {
        if (addActivity($user_id, $sport_type, $distance, $duration, $avg_heart_rate)) {
            echo "Activité ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'activité.";
        }
    } else {
        echo "Erreur : La fonction addActivity() n'est pas définie.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une activité</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h1>Ajouter une activité</h1>
        <form method="POST">
            <label for="user_id">Nom utilisateur :</label>
            <input type="number" name="user_id" required>

            <label for="sport_type">Type de sport :</label>
            <select name="sport_type">
                <option value="running">Course</option>
                <option value="swimming">Natation</option>
                <option value="cycling">Cyclisme</option>
            </select>

            <label for="distance">Distance (km) :</label>
            <input type="number" step="0.1" name="distance" required>

            <label for="duration">Durée :</label>
            <input type="time" name="duration" required>

            <label for="avg_heart_rate">Fréquence cardiaque :</label>
            <input type="number" name="avg_heart_rate" required>

            <button type="submit" class="submit-btn">➕ Ajouter</button>
        </form>
    </div>
</body>

</html>
<?php require 'inc/footer.php'; ?>