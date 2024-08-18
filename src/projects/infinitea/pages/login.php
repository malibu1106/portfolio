<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start();

// ON VERIFIE POST + QUE LES CHAMPS NE SONT PAS VIDES ET ON RECUPERE LES VALEURS DU FORMULAIRE
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // CONNEXION A LA BDD
    require_once("../elements/open_bdd.php");

    // REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
    $sql = "SELECT id, first_name, last_name, password, rights FROM users WHERE email = :email";

    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);    
        $query->bindValue(':email', $email);
    
    // EXECUTION + CLOSE BDD
    $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        require_once("../elements/close_bdd.php");

    // SI $USER N'EST PAS VIDE > UN COMPTE AVEC CETTE ADRESSE EMAIL EXISTE
    if($user){
    $hashed_password = $user['password']; // ON RECUPERE LE MOT DE PASSE HASHÉ DE CE COMPTE

    // SI LE MOT DE PASSE EST CORRECT
        if (password_verify($password, $hashed_password)) { 
            $_SESSION["message"] = "<div id='alert_message'>Connexion réussie !</div>";
            $_SESSION["user_id"] = $user['id']; 
            $_SESSION["first_name"] = $user['first_name']; 
            $_SESSION["last_name"] = $user['last_name']; 
            $_SESSION["admin"] = $user['rights']; // STOCK rights DANS $_SESSION ( UTILISE PAR LA SUITE POUR SOIT AFFICHER LE BACK OFFICE, SOIT LE SITE NORMAL)
            $_SESSION["message"] = "<div id='alert_message'>Connexion réussie !</div>";
            header('Location: ../index.php');} // REDIRECTION, CHECK URL PLUS TARD

    // SI LE MOT DE PASSE EST INCORRECT
        else {
            $_SESSION["message"] = "<div id='alert_message'>Mot de passe incorrect !</div>";
            header('Location: ../index.php?page=connexion#main');} // REDIRECTION, CHECK URL PLUS TARD
    }
    // USER EST VIDE > AUCUN COMPTE AVEC CETTE ADRESSE EMAIL
    else {
        $_SESSION["message"] = "<div id='alert_message'>Adresse email inconnue !</div>";
        header('Location: ../index.php?page=connexion#main');} // REDIRECTION, CHECK URL PLUS TARD

}
// SI METHOD != POST OU UN CHAMP EST VIDE
else{
    $_SESSION["message"] = "<div id='alert_message'>Erreur de traitement !</div>";
    header('Location: ../index.php?page=connexion#main'); // REDIRECTION, CHECK URL PLUS TARD
}
?>