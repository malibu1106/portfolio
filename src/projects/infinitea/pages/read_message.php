<?php 

require_once ('../elements/open_bdd.php');

$id = $_GET['id'];
$status = "true";


$sql ="UPDATE contact SET status = :status WHERE id =:id ";
$query = $db->prepare($sql);
$query->bindValue(':id', $id);
$query->bindValue(':status', $status);

$query->execute(); // Exécute la requête

$_SESSION["message"] = "<div id='alert_message'>Message marqué comme lu!</div>";
        header('Location: ../index.php?page=contact_control#main');
?>