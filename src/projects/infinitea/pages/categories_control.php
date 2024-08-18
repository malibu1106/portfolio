<?php
$userid = $_SESSION['user_id'];
require_once ('elements/open_bdd.php');
if($_SESSION['admin'] === "full"){
    $sql = "SELECT * FROM categories";}

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');
?>
<h3>Ajouter une catégorie</h3>

<form method="POST" action="pages/create_new_category.php" enctype="multipart/form-data"class="max-w-md mx-auto">
<div class="relative z-0 w-full mb-5 group">
      <input name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-purple-700 peer" placeholder=" " required />
      <label for="produit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-pink-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom de la nouvelle catégorie</label>
    </div>


  <button type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-900 dark:hover:bg-pink-500 my-2">Valider</button>
</form>

<h3>Supprimer une catégorie</h3>

<div id="liste_categories" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Nom de la catégorie
                </th>

                <th scope="col" class="px-2 py-3">
                    Actions
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category){
                
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
                echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                    echo $category['name'];
                echo '</th>';

                echo '<td class="px-2 py-1">';   
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_category.php?id=' . $category['id'] . '" class="font-medium">Confirmer</a></button>';
                echo '</td>';
                echo '</tr>';
            }?>
            
        </tbody>
    </table>
</div>
