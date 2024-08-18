<ul class="back_office_menu">
<?php 


require_once ('elements/open_bdd.php');

    $sql = "SELECT * FROM contact WHERE status = 'false' "; 

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$unread = $query->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM orders WHERE processed IS NULL"; 

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$unprocessed= $query->fetchAll(PDO::FETCH_ASSOC);



require_once ('elements/close_bdd.php');


         if(!empty($_SESSION['admin'])){            
            echo '<a href="index.php?page=add_product#main"><li>Ajouter un produit</li></a>';
            echo '<a href="index.php?page=product_list#main"><li>Gérer ';
            if($_SESSION['admin'] === "full"){echo 'l';}else{echo 'm';}
                echo'es produits</li></a>';
            echo '<a href="index.php?page=commandes_control#main"><li>Voir les commandes ';
            if ($unprocessed){echo '<span style="color:red">(' .count($unprocessed). ')</span>';}
            echo '</li></a>';
            echo '<a href="index.php?page=contact_control#main"><li>Voir les messages ';
            if ($unread){echo '<span style="color:red">(' .count($unread). ')</span>';}
            echo '</li></a>';
                if($_SESSION['admin'] === "full"){
                    echo '<a href="index.php?page=user_control#main"><li>Gérer les utilisateurs</li></a>';
                    echo '<a href="index.php?page=categories_control#main"><li>Gérer les catégories</li></a>';
                    
                }
                
            }
?>
</ul>