<?php 
session_start();
include '../php_sql/db_connect.php'; // Inclure le fichier de connexion à la base de données

// Vérifier si l'utilisateur est connecté
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");  
    exit();  
}

// Récupérer l'ID de l'utilisateur
$user_id = $_SESSION['user_id'];

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Vérifier que le nouveau mot de passe correspond à la confirmation
    if ($new_password !== $confirm_new_password) {
        $_SESSION['info_message'] = "Les nouveaux mots de passe ne correspondent pas.";
        header('Location: ../pages/profile.php');
        exit();
    }

    // Vérifier le mot de passe actuel de l'utilisateur
    $query = "SELECT password FROM users WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->execute(['user_id' => $user_id]);
    $user = $stmt->fetch();

    // Vérifier si le mot de passe actuel est correct
    if ($user && password_verify($current_password, $user['password'])) {
        // Mettre à jour le mot de passe
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password = :new_password WHERE user_id = :user_id";
        $update_stmt = $db->prepare($update_query);
        $update_stmt->execute([
            'new_password' => $hashed_new_password,
            'user_id' => $user_id
        ]);

        $_SESSION['info_message'] = "Votre mot de passe a été mis à jour avec succès.";
    } else {
        $_SESSION['info_message'] = "Mot de passe actuel incorrect. Veuillez réessayer.";
    }

    // Redirection vers la page de profil
    header('Location: ../pages/profile.php');
    exit();
}
?>
