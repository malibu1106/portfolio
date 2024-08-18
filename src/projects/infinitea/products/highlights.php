<?php

// CONNEXION A LA BDD
require_once("elements/open_bdd.php");

// REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
$sql = "SELECT * FROM products WHERE highlight = TRUE";

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);

//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$highlights = $query->fetchAll(PDO::FETCH_ASSOC);

//FERMETURE DE LA CONNEXION A DECOMMENTER APRES LES TESTS P-E
//require_once("elements/close_bdd.php");

// SI DES PRODUITS SONT HIGHLIGHT?>
<h3>Nos produits à la une</h3>
<section class="highlights">
    <div id="left_arrow"><svg class="w-20 h-20 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
</svg>
</div>
    <div id="right_arrow"><svg class="w-20 h-20 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
</svg>
</div>
    <?php foreach($highlights as $highlight){
        if($highlight['category'] === "accessoires") {$cat = "accessoire";}
        elseif($highlight['category'] === "coffrets") {$cat = "coffret";}
        else{$cat = "the";}
    echo '<div class="highlights_products">';
    echo '<a href="./index.php?page=product&cat='.$cat.'&id=' . $highlight['id'] . '#main">';
    echo '<img src="' . $highlight['image_filename'] . '">';
    echo '</a>';
    echo '<div class="highlights_details">';
    echo '<span class="mt-4 block font-semibold text-xl">' . $highlight['name'] . '</span>';
    echo '</div>';
    echo '</div>';}
?>
</section>

<section class="highlights_desktop">
    <div class="p-1 flex flex-wrap items-center justify-center">


<?php foreach($highlights as $highlight){
    $price = $highlight['price_kg'] / 10;
    if($highlight['category'] === "accessoires") {$cat = "accessoire";}
    elseif($highlight['category'] === "coffrets") {$cat = "coffret";}
    else{$cat = "the";}
    echo'
    <a href="./index.php?page=product&cat='.$cat.'&id=' . $highlight['id'] . '#main">
    <div class="flex-shrink-0 m-6 relative overflow-hidden  rounded-lg max-w-xs shadow-lg">
        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
            style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
        </svg>
        <div class="relative pt-10 px-10 flex items-center justify-center">
            
            <img class="relative w-40" src="' . $highlight['image_filename'] . '" alt="">
        </div>
        <div class="relative text-white px-6 pb-6 mt-6">
            <div class="flex justify-between">
                <span class="block font-semibold text-xl">' . $highlight['name'] . '</span>
                <span class="block rounded-full text-purple-500 text-xs font-bold px-3 py-2 leading-none flex items-center">' . $price . ' €</span>
            </div>
        </div>
    </div>
    </a>';}?>
        </div>
</section>


