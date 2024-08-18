<?php 
session_start();


if (isset($_SESSION['user_id'])){


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['product_ID'])
 && !empty($_POST['quantity']) && !empty($_POST['product_name']) && !empty($_POST['product_image'])
){
    // FORMULAIRE BIEN REMPLI DONC ON GERE LES DONNEES
    
        $product_ID = $_POST['product_ID'];
        $quantity = $_POST['quantity'];
        $product_name = $_POST['product_name'];
        $product_image = $_POST['product_image'];
        $user_ID = $_SESSION['user_id'];

    require_once ('../elements/open_bdd.php');

    $sql = "INSERT INTO carts (product_ID, product_name, product_image, quantity, user_ID)
    VALUES (:product_ID, :product_name, :product_image, :quantity, :user_ID)";
 
     // PREPARATION DE LA REQUETE
     $query = $db->prepare($sql);    
         $query->bindValue(':product_ID', $product_ID);
         $query->bindValue(':quantity', $quantity);
         $query->bindValue(':product_name', $product_name);
         $query->bindValue(':product_image', $product_image);
         $query->bindValue(':user_ID', $user_ID);
     // EXECUTION + CLOSE BDD
     $query->execute();

     $_SESSION["message"] = "<div id='alert_message'>Produit ajouté au panier!</div>";
    require_once("../elements/close_bdd.php");
    header('Location: ../index.php?page=cart#main');
}
else{
    $_SESSION["message"] = "<div id='alert_message'>Erreur durant l'ajout au panier!</div>";
    header('Location: ../index.php');

}

}
else{
    $_SESSION["message"] = "<div id='alert_message'>Connectez-vous pour ajouter un produit au panier!</div>";
    header('Location: ../index.php?page=connexion#main');
}
?>