<?php
session_start();
if(isset($_SESSION['admin']) && ($_SESSION['admin'] === "full")){
    $id = strip_tags($_GET['id']);
    $rights = strip_tags($_GET['rights']);
    // CONNEXION A LA BDD
    require_once("../elements/open_bdd.php");

    // REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
    $sql = "UPDATE users SET rights = :rights WHERE id=:id";

    // PREPARATION DE LA REQUETE
    $query = $db->prepare($sql);    
        $query->bindValue(':rights', $rights);
        $query->bindValue(':id', $id);
    
    // EXECUTION + CLOSE BDD
    $query->execute();
        require_once("../elements/close_bdd.php");
        $_SESSION['message'] = "<div id='alert_message'>Droits de l'utilisateur édités</div>";
        header('Location: ../index.php?page=user_control');
}
else
header('Location: ../index.php');
?>
