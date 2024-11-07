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
if (isset($_GET) && !empty($_GET['permanence_id'])) {
    // Initialisation de la requête SQL
    $sql = "DELETE FROM permanences WHERE permanence_id = :permanence_id";
    $query = $db->prepare($sql);  // Prépare la requête
    $query->bindValue(':permanence_id', $_GET['permanence_id'], PDO::PARAM_INT);

    // Exécute la requête
    $query->execute();

    $_SESSION['info_message'] = "Permanence supprimée";
        header("Location: ../pages/back_office_permanences.php");
        exit();
}

    else {
        // Message d'erreur si la requête est invalide
        $_SESSION['info_message'] = "Erreur de traitement de la requête";
        header("Location: ../pages/back_office_permanences.php");
        exit();
    }

?>
