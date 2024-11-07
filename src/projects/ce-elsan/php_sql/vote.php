<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

require_once('../php_sql/db_connect.php');

// Récupérer les données de la requête
$user_id = $_SESSION['user_id']; // Assure-toi que l'utilisateur est connecté et que son ID est stocké en session
$suggestion_id = isset($_GET['suggestion_id']) ? (int)$_GET['suggestion_id'] : null;
$vote_value = isset($_GET['vote']) ? (int)$_GET['vote'] : null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Récupérer la page actuelle pour la redirection

if (!$user_id || !$suggestion_id || ($vote_value !== 1 && $vote_value !== -1)) {
    // Si les données ne sont pas valides, rediriger ou afficher une erreur
    $_SESSION['info_message'] = "Erreur lors du traitement du vote.";
    header('Location: ../pages/suggestions.php?page=' . $page);
    exit;
}

// Vérifier si l'utilisateur a déjà voté pour cette suggestion
$sql = "SELECT vote_id, vote_value FROM votes WHERE user_id = :user_id AND suggestion_id = :suggestion_id";
$query = $db->prepare($sql);
$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$query->bindParam(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
$query->execute();
$existingVote = $query->fetch(PDO::FETCH_ASSOC);

if ($existingVote) {
    // L'utilisateur a déjà voté
    if ($existingVote['vote_value'] === $vote_value) {
        // Si le vote est identique au précédent, afficher un message
        $_SESSION['info_message'] = "Vous avez déjà voté de cette manière.";
    } else {
        // Sinon, mettre à jour le vote
        $sql = "UPDATE votes SET vote_value = :vote_value WHERE vote_id = :vote_id";
        $query = $db->prepare($sql);
        $query->bindParam(':vote_value', $vote_value, PDO::PARAM_INT);
        $query->bindParam(':vote_id', $existingVote['vote_id'], PDO::PARAM_INT);
        $query->execute();
        $_SESSION['info_message'] = "Votre vote a bien été modifié.";
    }
} else {
    // Si c'est un nouveau vote, l'insérer dans la table
    $sql = "INSERT INTO votes (user_id, suggestion_id, vote_value) VALUES (:user_id, :suggestion_id, :vote_value)";
    $query = $db->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
    $query->bindParam(':vote_value', $vote_value, PDO::PARAM_INT);
    $query->execute();
    $_SESSION['info_message'] = "Votre vote a bien été pris en compte.";
}

// Redirection vers la même page après le vote
header('Location: ../pages/suggestions.php?page=' . $page);
exit;
?>
