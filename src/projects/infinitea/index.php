<?php session_start(); 
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    $_SESSION['message'] ="<div id='alert_message'></div>";        
}
else{
    $_SESSION['message'] ="<div id='alert_message'></div>";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="JS/script.js" defer></script>
    <!-- <link rel="stylesheet" href="CSS/style.css"> COMMENTÉ PARCE QUE TAILWIND LE RECUPERE AUTOMATIQUEMENT-->
    <link rel="stylesheet" href="CSS/output.css">
    <link rel="preload" href="Arsenal-Regular.woff2" as="font" type="font/woff2" crossorigin>

    <title>InfiniTea</title>
</head>

<body>

<a href="../../../index.php#infinitea"><div class="return_to_portfolio"></div></a>

    <div id="profilAndCart">
        <?php if(!(isset($_SESSION['admin'])) || !($_SESSION['admin'] === "full" || $_SESSION['admin'] === "self")){
            include 'elements/profil_and_cart.php';
        }
        
        ?>
    
    




    </div>    
        <?php
        
        include 'elements/header.php';
        ?>
    
    <div id="main">
    <?php
    if(isset($_GET['page']) && ($_GET['page'] === "edit_product") && !empty($_SESSION['admin'])){

        include 'pages/edit_product.php';
    }
    elseif(isset($_GET['page']) && ($_GET['page'] === "add_product") && !empty($_SESSION['admin'])){

        include 'pages/add_product.php';
    }
    elseif(isset($_GET['page']) && ($_GET['page'] === "categories_control") && !empty($_SESSION['admin'])){

        include 'pages/categories_control.php';
    }
    elseif(isset($_GET['page']) && ($_GET['page'] === "control_panel") && !empty($_SESSION['admin'])){

        include 'pages/control_panel.php';
    }

    elseif(isset($_GET['page']) && ($_GET['page'] === "product_list") && !empty($_SESSION['admin'])){

        include 'pages/product_list.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "connexion" ){
        include 'pages/connexion.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "coffrets" ){
        include 'pages/coffrets_grid.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "accessoires" ){
        include 'pages/accessoires_grid.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "cart" ){
        include 'pages/cart.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "paiement" ){
        include 'pages/paiement.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "commandes" ){
        include 'pages/commandes.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "contact" ){
        include 'pages/contact.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "commandes_control" ){
        include 'pages/commandes_control.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "commandes" ){
        include 'pages/commandes.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "contact_control" ){
        include 'pages/contact_control.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "product" ){
        if($_GET['cat'] === "the"){
            include 'elements/produit_the.php';
        }
        elseif($_GET['cat'] === "coffret"){
            include 'elements/produit_coffrets.php';
        }
        elseif($_GET['cat'] === "accessoire"){
            include 'elements/produit_accessoires.php';
        }

    }
    elseif(isset($_GET['page']) && $_GET['page'] === "inscription" ){
        include 'pages/inscription.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "logout" ){
        include 'pages/logout.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] === "profil" ){
        include 'pages/profil.php';
    }
    elseif(isset($_SESSION['admin']) && ($_SESSION['admin'] === "full") && isset($_GET['page']) && $_GET['page'] === "user_control" ){
        include 'pages/user_control.php'; 
    }

    
    else{
        include 'pages/accueil.php';
    }

    
   
        

        
   
    ?> 

</div>





<?php
      
        include 'elements/footer.php';?>

   
 

</body>

</html>