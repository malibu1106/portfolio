<?php
session_start();

if (isset($_POST) && !empty($_POST['first_name']) && !empty($_POST['last_name']) 
    && !empty($_POST['su_email']) && !empty($_POST['su_password']) && !empty($_POST['su_retyped_password'])) {

    try {
        // Assainir et hacher les données de formulaire
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $email = strip_tags($_POST['su_email']);
        $password = strip_tags($_POST['su_password']);
        $retyped_password = strip_tags($_POST['su_retyped_password']);

        // Vérifier que les deux mots de passe correspondent
        if ($password !== $retyped_password) {
            $_SESSION['info_message'] = "Les mots de passe ne correspondent pas.";
            header('Location: ../index.php'); // Redirection vers la page d'inscription
            exit();
        }

        // Vérification de la robustesse du mot de passe
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $_SESSION['info_message'] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule et un caractère spécial.";
            header('Location: ../index.php'); // Redirection vers la page d'inscription
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        require_once('../php_sql/db_connect.php');

        // Vérifier si l'email existe déjà
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $db->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $emailAlreadyUsed = $query->fetch(PDO::FETCH_ASSOC);

        if ($emailAlreadyUsed) { // SI L'ADRESSE MAIL EST DÉJÀ UTILISÉE
            $_SESSION['info_message'] = "Adresse email déjà utilisée.";
            header('Location: ../index.php'); // Redirection vers la page d'inscription
            exit();
        } else { // SI L'ADRESSE MAIL EST DISPONIBLE
            // Inscription de l'utilisateur dans la base de données
            $sql = "INSERT INTO users (first_name, last_name, email, password)
                    VALUES (:first_name, :last_name, :email, :password)";
            $query = $db->prepare($sql);
            $query->bindValue(':first_name', $first_name, PDO::PARAM_STR);
            $query->bindValue(':last_name', $last_name, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $query->execute();

            $_SESSION['info_message'] = "Inscription réussie.";
            header('Location: ../index.php'); // Redirection vers la page d'inscription
            exit();
        }

    } catch (PDOException $e) {
        // Gestion des erreurs de base de données
        $_SESSION['info_message'] = "Erreur lors de l'inscription : " . $e->getMessage();
        header('Location: ../index.php'); // Redirection vers la page d'inscription
        exit();
    }

} else {
    $_SESSION['info_message'] = "Formulaire mal rempli.";
    header('Location: ../index.php'); // Redirection vers la page d'inscription
    exit();
}
?>