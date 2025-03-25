<?php
require 'config.php';

// Récupérer tous les utilisateurs
$stmt = $pdo->query("SELECT id, username, email, created_at FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?= htmlspecialchars($user['username']) ?> - <?= htmlspecialchars($user['email']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>