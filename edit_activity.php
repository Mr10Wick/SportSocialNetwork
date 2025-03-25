<?php
require 'config.php';
require 'inc/header.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une activité</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h1>Modifier une activité</h1>
        <form method="POST">
            <input type="hidden" name="activity_id" value="<?= htmlspecialchars($activity['id']) ?>">

            <label for="distance">Distance (km) :</label>
            <input type="number" step="0.1" name="distance" value="<?= htmlspecialchars($activity['distance']) ?>"
                required>

            <label for="duration">Durée :</label>
            <input type="time" name="duration" value="<?= htmlspecialchars($activity['duration']) ?>" required>

            <label for="avg_heart_rate">Fréquence cardiaque :</label>
            <input type="number" name="avg_heart_rate" value="<?= htmlspecialchars($activity['avg_heart_rate']) ?>"
                required>

            <button type="submit" class="submit-btn">✏️ Modifier</button>
        </form>
    </div>
</body>

</html>
<?php require 'inc/footer.php'; ?>