<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php");
    exit();
}

// Vérifier si l'utilisateur a le rôle d'administrateur
if ($_SESSION['role'] !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php");
    exit();
}

// Inclure le fichier de connexion à la base de données
include '../php_sql/db_connect.php'; // Assurez-vous que le chemin est correct

// Vérifier si les paramètres 'suggestion_id' et 'status' sont présents
if (isset($_GET['suggestion_id']) && isset($_GET['status'])) {
    $suggestion_id = $_GET['suggestion_id'];
    $status = $_GET['status'];

    // Utiliser une requête préparée pour éviter les injections SQL
    if ($status === 'blocked') {
        // Supprimer la suggestion
        $sql = "DELETE FROM suggestions WHERE suggestion_id = :suggestion_id";
        $query = $db->prepare($sql);
        $query->bindParam(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
        
        if ($query->execute()) {
            $_SESSION['info_message'] = "La suggestion a été refusée avec succès.";
        } else {
            $_SESSION['info_message'] = "Erreur lors de la suppression de la suggestion.";
        }

    } elseif ($status === 'accepted') {
        // Mettre à jour la visibilité de la suggestion
        $sql = "UPDATE suggestions SET is_visible = 1 WHERE suggestion_id = :suggestion_id";
        $query = $db->prepare($sql);
        $query->bindParam(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
        
        if ($query->execute()) {
            $_SESSION['info_message'] = "La suggestion a été acceptée avec succès.";
        } else {
            $_SESSION['info_message'] = "Erreur lors de l'acceptation de la suggestion.";
        }
    } else {
        $_SESSION['info_message'] = "Statut de suggestion inconnu.";
    }
} else {
    $_SESSION['info_message'] = "Identifiant de suggestion manquant.";
}

// Redirection vers la page précédente (ou vers une autre page de votre choix)
header("Location: ../pages/back_office_suggestions.php");
exit();
?>
