<?php

require_once ('elements/open_bdd.php');
if($_SESSION['admin']){
    $sql = "SELECT * FROM orders ORDER BY date DESC";
 
}
// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$orders = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');
?>
<div id="liste_commandes" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Date
                </th>
                <th scope="col" class="px-2 py-3">
                    Prénom
                </th>
                <th scope="col" class="px-2 py-3">
                    Nom
                </th>
                <th scope="col" class="px-2 py-3">
                    Email
                </th>
                <th scope="col" class="px-2 py-3">
                    Adresse
                </th>
                <th scope="col" class="px-2 py-3">
                    Contenu
                </th>
                <th scope="col" class="px-2 py-3">
                    Prix
                </th>
                <th scope="col" class="px-2 py-3">
                    Payé
                </th>
                <th scope="col" class="px-2 py-3">
                    Traitement
                </th>
                <th scope="col" class="px-2 py-3">
                    Action
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order){
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';

                echo '<td class="px-2 py-4">';
                echo $order['date'];
                echo '</td>';

                echo '<td scope="row" class="px-2 font-medium text-gray-900 whitespace-nowrap ">';
                echo $order['first_name'];                
                echo '</td>';

                echo '<td scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                echo $order['last_name'];
                echo '</td>';

                echo '<td class="px-2 py-4">';
                echo $order['email'];
                echo '</td>';
               
                echo '<td class="px-2 py-4">';
                echo $order['address'];
                echo '</td>';

                echo '<td class="px-2 py-4">';
                echo $order['content'];
                echo '</td>';

                echo '<td class="px-2 py-4">';
                echo $order['price'];
                echo ' €';
                echo '</td>';

                echo '<td class="px-2 py-4">';
                if($order['paid'] === "true"){
                    echo '✅';
                }
                echo '</td>';

                echo '<td class="px-2 py-4">';
                if($order['processed'] === "true"){
                    echo '✅';
                }
                else{
                    echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-orange-800 my-2"><a href="pages/send_order.php?id=' . $order['id'] . '" class="font-medium ">Envoyer</a></button>';
                }
                echo '</td>';


                echo '<td class="px-2 py-4">';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_order.php?id=' . $order['id'] . '" class="font-medium">Confirmer</a></button>';echo '</td>';
                


            echo '</tr>';
        }?>
            
        </tbody>
    </table>
</div>
