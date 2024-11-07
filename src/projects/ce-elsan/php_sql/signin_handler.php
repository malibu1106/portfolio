<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start();

// ON VERIFIE POST + QUE LES CHAMPS NE SONT PAS VIDES ET ON RECUPERE LES VALEURS DU FORMULAIRE
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // CONNEXION A LA BDD
    require_once("db_connect.php");

    // REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
    $sql = "SELECT * FROM users WHERE email = :email";

    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);    
        $query->bindValue(':email', $email);
    
    // EXECUTION + CLOSE BDD
    $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        require_once("db_disconnect.php");

    // SI $USER N'EST PAS VIDE > UN COMPTE AVEC CETTE ADRESSE EMAIL EXISTE
    if($user){
    $hashed_password = $user['password']; // ON RECUPERE LE MOT DE PASSE HASHÉ DE CE COMPTE


        if ($user['role'] === "to_approve"){
            $_SESSION['info_message'] = "Votre compte n'a pas encore été validé par un administrateur";
            header("Location: ../index.php?");
            exit();}
        

        if ($user['role'] === "blocked"){
            $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
            header("Location: ../index.php?");
            exit();}

    // SI LE MOT DE PASSE EST CORRECT
        if (password_verify($password, $hashed_password)) { 
            $_SESSION["info_message"] = "Connexion réussie";
            $_SESSION['logged_in'] = 1;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];
            header('Location: ../pages/home.php');} // REDIRECTION

    // SI LE MOT DE PASSE EST INCORRECT
        else {
            $_SESSION["info_message"] = "Adresse mail ou mot de passe incorrect";
            header('Location: ../index.php');
            exit();} // REDIRECTION
    }
    // USER EST VIDE > AUCUN COMPTE AVEC CETTE ADRESSE EMAIL
    else {
        $_SESSION["info_message"] = "Adresse mail inconnue";
        header('Location: ../index.php');
        exit();} // REDIRECTION

}
// SI METHOD != POST OU UN CHAMP EST VIDE
else{
    $_SESSION["info_message"] = "Erreur de traitement";
    header('Location: ../index.php');
    exit();} // REDIRECTION

?>