<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start();
if(isset($_SESSION['admin']) && ($_SESSION['admin'] === "full")){


    $name = strip_tags($_POST['name']);
     // CONNEXION A LA BDD
     require_once("../elements/open_bdd.php");

     // REQUETE
     $sql = "INSERT INTO categories (name)
    VALUES (:name)";
 
     // PREPARATION DE LA REQUETE
     $query = $db->prepare($sql);    
         $query->bindValue(':name', $name);
     
     // EXECUTION + CLOSE BDD
     $query->execute();

     $_SESSION["message"] = "<div id='alert_message'>Catégorie ajoutée !</div>";
    require_once("../elements/close_bdd.php");
    header('Location: ../index.php?page=categories_control');}
    
?>