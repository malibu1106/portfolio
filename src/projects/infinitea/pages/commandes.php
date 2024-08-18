<?php
$user_id = $_SESSION['user_id'];
require_once ('elements/open_bdd.php');
$sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY date DESC";

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
$query->bindValue(':user_id', $user_id);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();

$userOrders = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');

?>

<div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Date
                </th>
                <th scope="col" class="px-2 py-3">
                    Contenu
                </th>
                <th scope="col" class="px-2 py-3">
                    Prix
                </th>
                <th scope="col" class="px-2 py-3">
                    Status
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userOrders as $userOrder){
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
                echo '<td scope="row" class="px-2 font-medium text-gray-900 whitespace-nowrap ">';
                echo $userOrder['date'];                
                echo '</td>';

                echo '<td scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                echo $userOrder['content'];
                echo '</td>';

                echo '<td class="px-2 py-4">';
                echo $userOrder['price'];
                echo ' €</td>';
               
                echo '<td class="px-2 py-4">';
                if($userOrder['processed'] === "true"){
                    echo '✅ Traitée';
                }
                else{
                    echo '⌛ En cours de traitement';
                }
                echo '</td>';
            echo '</tr>';
        }?>
            
        </tbody>
    </table>
</div>
