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
    $new_email = filter_input(INPUT_POST, 'new_email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    // Vérifier que l'adresse e-mail est valide
    if (!$new_email) {
        $_SESSION['info_message'] = "L'adresse e-mail saisie est invalide.";
        header('Location: ../pages/profile.php');
        exit();
    }

    // Vérifier le mot de passe de l'utilisateur
    $query = "SELECT password FROM users WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->execute(['user_id' => $user_id]);
    $user = $stmt->fetch();

    // Vérifier si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // Mettre à jour l'adresse e-mail
        $update_query = "UPDATE users SET email = :new_email WHERE user_id = :user_id";
        $update_stmt = $db->prepare($update_query);
        $update_stmt->execute([
            'new_email' => $new_email,
            'user_id' => $user_id
        ]);

        $_SESSION['info_message'] = "Votre adresse e-mail a été mise à jour avec succès.";
    } else {
        $_SESSION['info_message'] = "Mot de passe incorrect. Veuillez réessayer.";
    }

    // Redirection vers la page de profil
    header('Location: ../pages/profile.php');
    exit();
}
?>
