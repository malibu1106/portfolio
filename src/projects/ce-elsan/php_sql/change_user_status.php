<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php");
    exit();
}

if ($_SESSION['role'] !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php");
    exit();
} 
// UPDATE USER STATUS
require_once('../php_sql/db_connect.php');

if (isset($_GET) && !empty($_GET['user_id']) && !empty($_GET['role'])) {
    // Initialisation de la requête SQL
    if ($_GET['role'] === "deleted") {
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $query = $db->prepare($sql);  // Prépare la requête
        $query->bindValue(':user_id', $_GET['user_id'], PDO::PARAM_INT);
    } elseif (in_array($_GET['role'], ["admin", "user", "blocked"])) {
        $sql = "UPDATE users SET role = :role WHERE user_id = :user_id";
        $query = $db->prepare($sql);  // Prépare la requête
        // Bind des valeurs pour éviter les injections SQL
        $query->bindValue(':user_id', $_GET['user_id'], PDO::PARAM_INT);
        $query->bindValue(':role', $_GET['role'], PDO::PARAM_STR);
    }

    // Exécute la requête
    $query->execute();

    // Redirections et messages de succès en fonction du rôle
    if ($_GET['role'] === "blocked") {
        $_SESSION['info_message'] = "Ce compte est désormais bloqué";
    } elseif ($_GET['role'] === "user") {
        $_SESSION['info_message'] = "Ce compte est désormais utilisateur";
    } elseif ($_GET['role'] === "admin") {
        $_SESSION['info_message'] = "Ce compte est désormais administrateur";
    } elseif ($_GET['role'] === "deleted") {
        $_SESSION['info_message'] = "Ce compte est désormais supprimé";
    }
    // Redirection après modification
    header("Location: ../pages/back_office_users.php");
    exit();
} else {
    // Message d'erreur si la requête est invalide
    $_SESSION['info_message'] = "Erreur de traitement de la requête";
    header("Location: ../pages/back_office_users.php");
    exit();
}
?>
