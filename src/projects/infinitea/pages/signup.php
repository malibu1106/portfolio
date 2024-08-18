<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start(); 

// ON INITIALISE LES VARIABLES DES CHAMPS OPTIONNELS DU FORMULAIRE, ON LES PUSH DANS TOUS LES CAS DANS LA BDD POUR SIMPLIFIER LE TRAITEMENT
$gender = "";
$date_of_birth = date('Y-m-d');
$date_of_registration = date('Y-m-d'); 

// ON VERIFIE POST + QUE LES CHAMPS OBLIGATOIRES NE SONT PAS VIDES ET ON RECUPERE LES VALEURS DU FORMULAIRE
if($_SERVER['REQUEST_METHOD'] === 'POST'
&& !empty($_POST['first_name']) && !empty($_POST['last_name'])
&& !empty($_POST['email']) && !empty($_POST['password'])){
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);}

// SI LES CHAMPS OPTIONNELS SONT REMPLIS, ALORS ON RECUPERE EGALEMENT LEURS VALEURS
if(!empty($_POST['gender'])){
        $gender = strip_tags($_POST['gender']);}
if(!empty($_POST['date_of_birth'])){
        $date_of_birth = strip_tags($_POST['date_of_birth']);}

// CONNEXION A LA BDD
require_once ('../elements/open_bdd.php');


    // REQUETE POUR VOIR SI UNE ADRESSE IDENTIQUE EXISTE DEJA OU PAS
    $sql = "SELECT email FROM users where email = :email";
    $query = $db->prepare($sql);
    $query->bindValue(':email', $email);
    $query->execute();
    $newEmail = $query->fetchAll(PDO::FETCH_ASSOC);

    // SI L'EMAIL EST DEJA UTILISÉ, ON DECLARE DES $_SESSION POUR LES RECUPERER ET EVITER A L'UTILISATEUR DE RETAPER SES INFOS
    if(!empty($newEmail)){
        require_once("../elements/close_bdd.php");
        $_SESSION["emailAlreadyUsed"] = true;
        $_SESSION["message"] = "<div id='alert_message'>Cette adresse email est déjà utilisée !</div>";
        
        $_SESSION["first_name"] = $first_name;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = ($_POST['password']); // SANS HASHAGE 
        $_SESSION["gender"] = $gender; //NEED VERIF SUR LA PAGE D'INSCRIPTION CES DEUX LA, si !empty on les met, sinon bah non :D
        $_SESSION["date_of_birth"] = $date_of_birth; //NEED VERIF SUR LA PAGE D'INSCRIPTION CES DEUX LA, si !empty on les met, sinon bah non :D
        
        header('Location: ../index.php?page=signup'); // REDIRECTION, CHECK URL PLUS TARD
    }

    else{
        // INSCRIPTION DE L'UTILISATEUR SI L'EMAIL N'EST PAS UTILISÉ
    $sql = "INSERT INTO users (first_name, last_name, gender, date_of_birth, date_of_registration, email, password)
    VALUES (:first_name, :last_name, :gender, :date_of_birth, :date_of_registration, :email, :password)";

    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);
        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':gender', $gender);    
        $query->bindValue(':date_of_birth', $date_of_birth);
        $query->bindValue(':date_of_registration', $date_of_registration);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);

    // EXECUTION + CLOSE BDD
    $query->execute();
    require_once("../elements/close_bdd.php");

    // MESSAGE DE CONFIRMATION + REDIRECTION    
    $_SESSION["message"] = "<div id='alert_message'>Inscription réussie !</div>";
    header('Location: ../index.php?page=login'); // REDIRECTION, CHECK URL PLUS TARD
    }    
?>