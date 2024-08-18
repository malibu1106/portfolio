<?php

$id = $_SESSION['user_id'];
require_once ('elements/open_bdd.php');

$sql = "SELECT * FROM users where id=:id";
 
     // PREPARATION DE LA REQUETE
     $query = $db->prepare($sql);    
     $query->bindValue(':id', $id);
     
     // EXECUTION + CLOSE BDD
     $query->execute();
     $userInfos = $query->fetch(PDO::FETCH_ASSOC);

     $sql = "SELECT price FROM orders WHERE user_id = :id ORDER BY id DESC LIMIT 1";
 
     // PREPARATION DE LA REQUETE
     $query = $db->prepare($sql);    
     $query->bindValue(':id', $id);
     
     // EXECUTION + CLOSE BDD
     $query->execute();
     $orderPrice = $query->fetch(PDO::FETCH_ASSOC);

    //  echo '<pre>';
    //  print_r($userInfos);
    //  echo '</pre>';
?>






<section class="py-8 antialiased flex flex-col items-center">
  <form method="POST" action="pages/finalisation_commande.php" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
  <h3>Paiement & livraison</h3>
    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$userInfos['email']?>"/>
        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Votre e-mail *</label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group my-5">
            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$userInfos['first_name']?>"/>
            <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom *</label>
        </div>
        <div class="relative z-0 w-full mb-5 group my-5">
            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required value="<?=$userInfos['last_name']?>"/>
            <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom *</label>
        </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="adresse" id="adresse" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " value="<?=$userInfos['adresse']?>"/>
        <label for="adresse" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Votre adresse *</label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group my-5">
            <input type="text" name="zipcode" id="zipcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " value="<?=$userInfos['zipcode']?>"/>
            <label for="zipcode" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code postal *</label>
        </div>
        <div class="relative z-0 w-full mb-5 group my-5">
            <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " value="<?=$userInfos['ville']?>"/>
            <label for="ville" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Commune *</label>
        </div>
    </div>

   
  

    <div class="space-y-4 flex flex-col items-center">
    <h3 class="text-xl font-semibold text-gray-900">Méthode de paiement sécurisée</h3>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 justify-items-center"> 
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600" checked />
                </div>

                <div class="ms-4 text-sm">
                    <label for="credit-card" class="font-medium leading-none text-gray-900">Carte de crédit</label>
                    <p id="credit-card-text" class="mt-1 text-xs font-normal text-gray-500">Payez avec votre carte</p>
                </div>
            </div>

            <div class="mt-4 flex items-center gap-2">
                <button type="button" class="text-sm font-medium">Supprimer</button>

                <div class="h-3 w-px shrink-0 bg-gray-200"></div>

                <button type="button" class="text-sm font-medium">Editer</button>
            </div>
        </div>

        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input id="paypal-2" aria-describedby="paypal-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600" />
                </div>

                <div class="ms-4 text-sm">
                    <label for="paypal-2" class="font-medium leading-none text-gray-900">Utilisez Paypal</label>
                    <p id="paypal-text" class="mt-1 text-xs font-normal text-gray-500">Connectez-vous à votre compte</p>
                </div>
            </div>

            <div class="mt-4 flex items-center gap-2">
                <button type="button" class="text-sm font-medium">Supprimer</button>

                <div class="h-3 w-px shrink-0 bg-gray-200"></div>

                <button type="button" class="text-sm font-medium">Editer</button>
            </div>
        </div>
    </div>


</div>


      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div class="flow-root">
          <div class="-my-3 divide-y divide-gray-200 mt-8 ">
    

            <dl class="flex items-center justify-between gap-4 py-3">
              <dt class="text-base font-bold text-gray-900 ">Total</dt>
              <dd class="text-base font-bold text-gray-900 "><?=$orderPrice['price']?> €</dd>
            </dl>
          </div>
        </div>

        <div class="space-y-3">
        <button id="paiement" type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-900 dark:hover:bg-pink-500 my-2">Valider</button>
        </div>
      </div>
    </div>
  </form>
</section>