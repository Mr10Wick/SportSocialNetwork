<?php
require 'config.php';

// Vérifier si la fonction deleteActivity() est bien définie
if (!function_exists('deleteActivity')) {
    die("Erreur : La fonction deleteActivity() n'est pas définie.");
}

// Vérifier si un ID d'activité est passé en paramètre
if (isset($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];

    if (deleteActivity($activity_id)) {
        // Rediriger vers la page d'accueil après suppression
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "Aucune activité sélectionnée.";
}
?>