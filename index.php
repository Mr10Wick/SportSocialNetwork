<?php
require 'config.php';
require 'inc/header.php';

// Récupérer les activités récentes
$activities = getActivities();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Réseau Sportif</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1 class="section-title">📢 Fil d'actualité des activités sportives</h1>
        <?php if (empty($activities)): ?>
            <p>Aucune activité enregistrée.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($activities as $activity): ?>
                    <li class="activity-card">
                        <strong><?= htmlspecialchars($activity['username']) ?></strong> a fait une séance de
                        <strong><?= htmlspecialchars($activity['sport_type']) ?></strong>
                        <br> Distance : <?= htmlspecialchars($activity['distance']) ?> km
                        <br> Durée : <?= htmlspecialchars($activity['duration']) ?>
                        <br> Fréquence cardiaque moyenne : <?= htmlspecialchars($activity['avg_heart_rate']) ?> BPM
                        <br> <small>Posté le <?= htmlspecialchars($activity['created_at']) ?></small>

                        <div class="buttons">
                            <a href="edit_activity.php?id=<?= $activity['id'] ?>" class="edit-btn">✏️ Modifier</a>
                            <form action="delete_activity.php" method="POST" style="display:inline;"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?');">
                                <input type="hidden" name="activity_id" value="<?= $activity['id'] ?>">
                                <button type="submit" class="delete-btn">🗑️ Supprimer</button>
                            </form>

                        </div>
                    </li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>
<?php require 'inc/footer.php'; ?>