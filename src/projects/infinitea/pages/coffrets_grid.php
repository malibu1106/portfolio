<?php
require_once("elements/open_bdd.php");
// REQUETE AVEC CE QU'IL NOUS FAUT A STOCKER EN $_SESSION SI BESOIN 
$sql = "SELECT * FROM products WHERE category = 'coffrets'";

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);

//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$coffrets = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="p-1 flex flex-col items-center justify-center">
    <h3>Nos coffrets coup de coeur</h3>
<div class="p-1 flex flex-wrap items-center justify-center">



<?php
    foreach ($coffrets as $coffret){

    echo '<a href="../index.php?page=product&cat=coffret&id=' . $coffret['id'] . '#main">
    <div class="flex-shrink-0 m-6 relative overflow-hidden  rounded-lg max-w-xs shadow-lg">
        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
            style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
        </svg>
        <div class="relative pt-10 px-10 flex items-center justify-center">
            
            <img class="relative w-40" src="' . $coffret['image_filename'] . '" alt="">
        </div>
        <div class="relative text-white px-6 pb-6 mt-6">
            <div class="flex justify-between">
                <span class="block font-semibold text-xl">' . $coffret['name'] . '</span>
                <span class="block rounded-full text-purple-500 text-xs font-bold px-3 py-2 leading-none flex items-center">' . $coffret['price_kg'] . ' €</span>
            </div>
        </div>
    </div></a>';
    
    }?>



    </div><a href="../index.php#main" class="flex items-center justify-center font-semibold text-pink-600 text-lg mt-10">
  <svg class="fill-current mr-2 text-pink-600 text-lg w-4" viewBox="0 0 448 512">
    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
  </svg>
  Retour aux produits
</a></div>