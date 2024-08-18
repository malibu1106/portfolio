<?php
$userid = $_SESSION['user_id'];
require_once ('elements/open_bdd.php');
if($_SESSION['admin'] === "full"){
    $sql = "SELECT id, first_name, last_name, email, rights FROM users";}

// PREPARATION DE LA REQUETE
$query = $db->prepare($sql);
//EXECUTION DE LA REQUETE + STOCK DES DONNEES DANS LA VARIABLE
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);
require_once ('elements/close_bdd.php');
?>
<div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
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
                    Droits
                </th>
                <th scope="col" class="px-2 py-3">
                    Actions
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user){
                if($user['email'] !== "superuser@infinitea.com"){
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
                echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                    echo $user['first_name'];
                echo '</th>';
                echo '<td class="px-2 py-4">';
                echo $user['last_name'];
                echo '</td>';
                echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                    echo $user['email'];
                echo '</th>';
                echo '<td class="px-2 py-4">';
                echo $user['rights'];
                echo '</td>';
               
                echo '<td class="px-2 py-4">';
                if ($user['rights'] === "self"){
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=" class="font-medium ">- Droits</a></button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=full" class="font-medium ">+ Droits</a></button>';
                
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                }
                elseif ($user['rights'] === "full"){
                    echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">- Droits</a></button>';
                    echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                    }
                    elseif (empty($user['rights'])){
                        echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">+ Droits</a></button>';
                        echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                    }
                
                echo '</td>';
                echo '</tr>';}
        }?>
            
        </tbody>
    </table>
</div>