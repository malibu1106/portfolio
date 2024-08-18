<h3>Ajouter un Produit</h3>

<form method="POST" action="pages/create_new_product.php" enctype="multipart/form-data"class="max-w-md mx-auto">
    <input type="hidden" name="added_by" value="<?php echo $_SESSION['user_id'];?>">
<div class="relative z-0 w-full mb-5 group">
      <input name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required />
      <label for="produit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom du produit</label>
    </div>

<label for="Catégorie" class="block mb-2 text-sm font-medium text-gray-900">Sélectionnez la catégorie</label>
  <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-700 focus:border-purple-900 block w-full p-2.5">
  <?php
require_once ('elements/open_bdd.php');
$sql = "SELECT * FROM categories";
// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');


foreach ($categories as $categorie) {
echo '<option value="' . $categorie['name'] . '" required>' . $categorie['name'] . '</option>';
}

?>
    
  </select>
  <label for="description_courte" class="block mb-2 text-sm font-medium text-gray-900 ">Description sur l'index</label>
  <input type="text" id="description_courte" name="description_courte" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  " placeholder="Leave a comment..."></textarea>

  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
  <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  " placeholder="Leave a comment..."></textarea>

  <label for="composition"  class="block mb-2 text-sm font-medium text-gray-900 ">Composition</label>
  <textarea id="composition" name="composition" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Leave a comment..."></textarea>
 
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="price_kg" id="price_kg" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required />
        <label for="price_before_reduction" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix kg</label>
    </div>
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="price" id="price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " />
        <label for="price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix</label>
    </div>
  </div>

  <div class="relative z-0 w-full mb-5 group my-5 ">
      <input name="weight" id="weight" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " />
      <label for="weight" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Poids</label>
    </div>

    <label class="block mb-2 text-sm font-medium text-gray-900" for="image_filename">Ajoutez une image</label>
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  aria-describedby="image_filename" name="image_filename" id="image_filename" type="file">
 
      <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="temperature" id="temperature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required />
        <label for="temperature" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Température d'infusion</label>
    </div>
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="temps" id="temps" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required />
        <label for="temps" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Temps d'infusion</label>
    </div>

    <label for="highlight" class="block mb-2 text-sm font-medium text-gray-900">Ce produit est-il mis en avant?</label>
  <select id="highlight" name="highlight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-700 focus:border-purple-900 block w-full p-2.5">
<option value="1">oui</option>
<option value="0">non</option>
  </select>
  <button type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-900 dark:hover:bg-pink-500 my-2">Envoyer</button>
</form>
