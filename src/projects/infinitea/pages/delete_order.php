<?php
session_start();
if(isset($_SESSION['admin'])){
    // CONNEXION A LA BDD
    require_once("../elements/open_bdd.php");
    $id = strip_tags($_GET['id']);

    // REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
    $sql = "DELETE FROM orders WHERE id=:id";

    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);    
        $query->bindValue(':id', $id);
    
    // EXECUTION + CLOSE BDD
    $query->execute();
        require_once("../elements/close_bdd.php");
        $_SESSION["message"] = "<div id='alert_message'>Commande supprimée !</div>";
        header('Location: ../index.php?page=commandes_control#main');
}
else
header('Location: ../index.php');
?>