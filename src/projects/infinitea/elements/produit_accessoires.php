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
$product_ID = $product['id'];
$_product_name =$product['name'];
?>
<!-- <pre>
    <?php print_r($product);?>
</pre> -->
<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
    <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
        <img class="w-half" alt="image de la boite de thé" src="<?= $product['image_filename']?>" />
    </div> 
    <div class="md:hidden">
        <img class="w-half m-auto" alt="image de la boite de thé" src="<?= $product['image_filename']?>"/>
    </div>
    <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6 text-center"> <!-- Ajout de 'text-center' pour centrer le contenu -->
        <h3 class="mt-2"><?= $product['name']?></h3> 
        <h4 class="py-2 border-b border-gray-200"><?= $product['composition']?></h4>
       
        <div class="py-2 border-b border-gray-200 flex flex-col items-center">
            <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 mt-7 text-left"> <!-- Ajout de 'text-left' pour aligner le texte à gauche -->
            <?= $product['description']?>
            </p>
            

        </div>
        <form action="pages/add_to_cart_ac.php" method="POST" class="max-w-xs mx-auto mt-4">
            <input type="hidden" name="product_ID" value="<?= $product_ID;?>">
            <input type="hidden" name="product_name" value="<?= $_product_name;?>">
            <input type="hidden" name="product_image" value="<?= $product['image_filename']?>">
            
      
            <div class="flex items-center justify-center mt-2">
                <span id="basePrice" style="display:none"><?= $product['price_kg']?></span>
                <i id="finalPrice" class="text-gray-600"></i>
            </div>
            <div class="flex items-center mt-8 text-sm  text-gray-900">
                <svg class="w-6 h-6 mr-2 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                </svg>
                <label for="counter-input" class="flex-shrink-0"><span>Choisissez la quanti'thé :</span></label>
                <div class="relative flex items-center ml-2">
                    <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" name="quantity" id="counter-input" data-input-counter class="flex-shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="1" required />
                    <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="flex-none rounded-md bg-purple-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-purple-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-700 mt-4">Ajouter au panier</button>
            <a href="./index.php#main" class="flex items-center justify-center font-semibold text-pink-600 text-lg mt-10">
  <svg class="fill-current mr-2 text-pink-600 text-lg w-4" viewBox="0 0 448 512">
    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
  </svg>
  Retour aux produits
</a>
        </form>
    </div>
</div>

<script type="text/javascript" src="JS/product_access_coffrets.js" defer></script>
