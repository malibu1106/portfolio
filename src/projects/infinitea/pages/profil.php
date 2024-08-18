<?php 
require_once ('elements/open_bdd.php');
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id= :id";
// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
$query->bindValue(':id', $id);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY date DESC";

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
$query->bindValue(':user_id', $id);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();

$userOrders = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');


if($userOrders){
echo '<div class="max-w-md mx-auto flex justify-center">
    <a href="index.php?page=commandes#main"><button class="mt-8 mb-8 text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-700 hover:bg-green-600 my-2">Mes commandes</button></a>
</div>';}

?>

<h3>Editez votre profil</h3>
<form id="signupForm" method="POST" action="pages/edit_profile.php" enctype="multipart/form-data"class="max-w-md mx-auto">
<div class="relative z-0 w-full mb-5 group">
      <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$user['email']?>"/>
      <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Votre e-mail *</label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$user['first_name']?>"/>
        <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom *</label>
    </div>
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$user['last_name']?>"/>
        <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom *</label>
    </div></div>
    <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="adresse" id="adresse" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " value="<?=$user['adresse']?>"/>
      <label for="adresse" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Votre adresse</label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="zipcode" id="zipcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" "  value="<?=$user['zipcode']?>"/>
        <label for="zipcode" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code postal</label>
    </div>
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" "  value="<?=$user['ville']?>"/>
        <label for="ville" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Commune</label>
    </div></div>
    <div class="relative z-0 w-full mb-5 group my-7">
         <label for="gender" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>     
  <br><?php
$userGender = $user['gender'];
$options = ["Homme", "Femme", "Non Binaire", "Autre"];
?>

<select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-700 focus:border-purple-900 block w-full p-2.5">
  <option value="<?= htmlspecialchars($userGender) ?>" selected><?= htmlspecialchars($userGender) ?></option>
  <?php foreach ($options as $option) : ?>
    <?php if ($option !== $userGender) : ?>
      <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
    <?php endif; ?>
  <?php endforeach; ?>
</select>
    </div>
    <div class="relative z-0 w-full mb-5 group my-5">
        <input type="date" name="date_of_birth" id="date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " value="<?=$user['date_of_birth']?>"/>
        <label for="date_of_birth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date de naissance</label>
    </div>

 <button id="editProfileButton" type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-900 dark:hover:bg-pink-500 my-2">Enregistrer</button>
</form>

