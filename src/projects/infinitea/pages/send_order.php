<?php 

require_once ('../elements/open_bdd.php');

$id = $_GET['id'];
$processed = "true";


$sql ="UPDATE orders SET processed = :processed WHERE id =:id ";
$query = $db->prepare($sql);
$query->bindValue(':id', $id);
$query->bindValue(':processed', $processed);

$query->execute(); // Exécute la requête

$_SESSION["message"] = "<div id='alert_message'>Commande envoyée!</div>";
        header('Location: ../index.php?page=commandes_control#main');
?>