<?php
$userid = $_SESSION['user_id'];
require_once ('elements/open_bdd.php');
if($_SESSION['admin'] === "self"){
    $sql = "SELECT id, name, category, image_filename FROM products WHERE added_by = $userid";}
else{
    $sql = "SELECT id, name, category, image_filename FROM products";  
}
// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');
?>
<div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Image
                </th>
                <th scope="col" class="px-2 py-3">
                    Produit
                </th>
                <th scope="col" class="px-2 py-3">
                    Catégorie
                </th>
                <th scope="col" class="px-2 py-3">
                    Actions
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product){
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
                echo '<td scope="row" class="px-2 font-medium text-gray-900 whitespace-nowrap ">';
                echo '<img class="miniatures_back" src="' . $product['image_filename'] . '">';                
                echo '</td>';

                echo '<td scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                echo $product['name'];
                echo '</td>';

                echo '<td class="px-2 py-4">';
                echo $product['category'];
                echo '</td>';
               
                echo '<td class="px-2 py-4">';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-purple-900 hover:bg-purple-800 my-2"><a href="index.php?page=edit_product&id=' . $product['id'] . '#main" class="font-medium ">Editer</a></button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_product.php?id=' . $product['id'] . '#main" class="font-medium">Confirmer</a></button>';
                echo '</td>';
            echo '</tr>';
        }?>
            
        </tbody>
    </table>
</div>
