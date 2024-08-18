<?php 
$id = $_GET['id'];
require_once ('elements/open_bdd.php');
$sql = "SELECT * FROM products WHERE id= :id";
// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
$query->bindValue(':id', $id);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$product = $query->fetch(PDO::FETCH_ASSOC);

require_once ('elements/close_bdd.php');

// echo '<pre>';
// print_r($product);
// echo '</pre>';
?>
