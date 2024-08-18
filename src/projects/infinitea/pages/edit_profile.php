<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start(); 
$id = $_SESSION['user_id'];

// ON INITIALISE LES VARIABLES DES CHAMPS OPTIONNELS DU FORMULAIRE, ON LES PUSH DANS TOUS LES CAS DANS LA BDD POUR SIMPLIFIER LE TRAITEMENT
$gender = "";
$zipcode = "";
$adresse = "";
$ville = "";
$date_of_birth = date('Y-m-d');
$date_of_registration = date('Y-m-d'); 

// ON VERIFIE POST + QUE LES CHAMPS OBLIGATOIRES NE SONT PAS VIDES ET ON RECUPERE LES VALEURS DU FORMULAIRE
if($_SERVER['REQUEST_METHOD'] === 'POST'
&& !empty($_POST['first_name']) && !empty($_POST['last_name'])
&& !empty($_POST['email'])){
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);}

// SI LES CHAMPS OPTIONNELS SONT REMPLIS, ALORS ON RECUPERE EGALEMENT LEURS VALEURS
if(!empty($_POST['gender'])){
        $gender = strip_tags($_POST['gender']);}
if(!empty($_POST['date_of_birth'])){
        $date_of_birth = strip_tags($_POST['date_of_birth']);}
if(!empty($_POST['adresse'])){
        $adresse = strip_tags($_POST['adresse']);}
if(!empty($_POST['zipcode'])){
        $zipcode = strip_tags($_POST['zipcode']);}
if(!empty($_POST['ville'])){
        $ville = strip_tags($_POST['ville']);}

// CONNEXION A LA BDD
require_once ('../elements/open_bdd.php');


   
        // INSCRIPTION DE L'UTILISATEUR SI L'EMAIL N'EST PAS UTILISÉ
    $sql = "UPDATE users SET first_name=:first_name, last_name = :last_name, gender = :gender, date_of_birth = :date_of_birth,
     email = :email, ville = :ville, zipcode = :zipcode, adresse = :adresse WHERE id = :id";



    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':gender', $gender); 
        $query->bindValue(':ville', $ville);   
        $query->bindValue(':zipcode', $zipcode);   
        $query->bindValue(':adresse', $adresse);      
        $query->bindValue(':date_of_birth', $date_of_birth);
        $query->bindValue(':email', $email);

    // EXECUTION + CLOSE BDD
    $query->execute();
    require_once("../elements/close_bdd.php");

    // MESSAGE DE CONFIRMATION + REDIRECTION    
    $_SESSION["message"] = "<div id='alert_message'>Changements effectués !</div>";
    header('Location: ../index.php?page=profil'); // REDIRECTION, CHECK URL PLUS TARD
    
?>