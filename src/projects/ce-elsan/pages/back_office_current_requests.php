<?php 
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
  $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
  header("Location: ../index.php");
  exit();
}

if ($_SESSION['role'] !== "admin") {
  $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
  header("Location: ../pages/home.php");
  exit();
} 

require_once('../php_sql/db_connect.php');
// Récupération des demandes
$sql = "SELECT current_request_id, company_name, image_url, category FROM requests";
$query = $db->prepare($sql);
$query->execute();
$demandes = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupération des catégories
$sql = "SELECT * FROM categories";
$query = $db->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <script src="js/script.js"></script>
  <title>Elsan</title>
</head>
<body class="pb-8">

<?php include '../includes/nav.php';?>

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les demandes</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">
<h3 class="font-bold text-xl text-center mb-4 bg-white text-blue-600 rounded p-2"><a href="add_or_edit_request.php">+ Ajouter une demande</a></h3>

<!-- Ajout du select pour trier par catégorie -->
<div class="text-center mb-4">
    <select id="categoryFilter" class="p-2 rounded border border-gray-300 w-full mx-auto text-blue-600 text-2xl text-center">
        <option value="all">Toutes les catégories</option>
        <?php
        // Récupérer et afficher toutes les catégories dans le select
        foreach ($categories as $categorie) {
            echo '<option value="'.$categorie['category_id'].'">'.ucfirst($categorie['name']).'</option>';
        }
        ?>
    </select>
</div>

    <div class="container" id="requestsList">

    <?php
    if (count($demandes) > 0) {
      foreach ($demandes as $demande) {
        // Récupérer le category_id correspondant à la demande
        $category_id = '';
        foreach ($categories as $categorie) {
            if ($categorie['name'] === $demande['category']) {
                $category_id = $categorie['category_id']; // Associer l'id de la catégorie
                break;
            }
        }

        // Affichage de la demande
        echo '<div class="request_row flex justify-between p-2" data-category="'.$category_id.'">
            <div class="container flex justify-between items-center w-3/4">
                <img class="h-16 w-16 bg-white p-1" src="'.$demande['image_url'].'" alt="logo de l\'entreprise">
                <p class="w-3/4 text-center truncate text-2xl">'.$demande['company_name'].'</p>
            </div>
            <div class="container flex items-center justify-end gap-4 w-1/4">
                <a href="add_or_edit_request.php?request_id='.$demande['current_request_id'].'">
                  <img src="../images/icons/edit.png" class="h-8 w-8" alt="éditer la demande">
                </a>
                <img src="../images/icons/delete_white.png" class="h-8 w-8 delete_request" alt="supprimer la demande">
                <div class="confirm_delete_request" style="display:none;">
                    <a href="../php_sql/delete_request.php?request_id='.$demande['current_request_id'].'">
                      <img src="../images/icons/cancel.png" class="h-8 w-8 rounded-full" alt="Confirmer la suppression de la demande">
                    </a>
                </div>
            </div>    
        </div>
        <p class="cancel_delete_request text-center m-2 font-bold text-red-200" style="display:none;">Annuler la suppression</p>';
      }
    } else {
      echo '<p class="text-center font-bold text-blue-600 text-2xl mt-4">Aucune demande disponible</p>';
    }
    ?>

    </div>

    <!-- Message si aucune demande n'est trouvée -->
    <p id="noResultsMessage" class="text-center font-bold text-white text-2xl mt-4" style="display: none;">Aucune demande trouvée</p>
</section>
    
</main> 

<script>
  // Fonction pour ajouter les gestionnaires d'événements
function addEventListeners() {
  document.querySelectorAll('.delete_request').forEach((deleteBtn, index) => {
    const confirmDelete = document.querySelectorAll('.confirm_delete_request')[index]; // Récupère la zone de confirmation
    const cancelDelete = document.querySelectorAll('.cancel_delete_request')[index]; // Récupère le bouton d'annulation

    // Au clic sur le bouton de suppression
    deleteBtn.addEventListener('click', () => {
      deleteBtn.style.display = 'none';  // Masque le bouton de suppression
      confirmDelete.style.display = 'block'; // Affiche la confirmation de suppression
      cancelDelete.style.display = 'block'; // Affiche le bouton d'annulation
    });

    // Au clic sur le bouton d'annulation
    cancelDelete.addEventListener('click', () => {
      deleteBtn.style.display = 'block';  // Réaffiche le bouton de suppression
      confirmDelete.style.display = 'none'; // Masque la confirmation de suppression
      cancelDelete.style.display = 'none'; // Masque le bouton d'annulation
    });
  });
}

// Fonction pour filtrer les demandes par catégorie
function filterByCategory() {
  const categoryFilter = document.getElementById('categoryFilter');
  const requests = document.querySelectorAll('.request_row');

  categoryFilter.addEventListener('change', () => {
    const selectedCategory = categoryFilter.value;
    
    requests.forEach(request => {
      const requestCategory = request.getAttribute('data-category');
      
      if (selectedCategory === 'all' || requestCategory === selectedCategory) {
        request.style.display = 'flex'; // Affiche la demande
      } else {
        request.style.display = 'none'; // Masque la demande
      }
    });

    checkVisibleRequests(); // Vérifie s'il reste des demandes visibles après le filtrage
  });
}

// Fonction pour vérifier s'il reste des demandes visibles et afficher le message si aucune n'est visible
function checkVisibleRequests() {
  const requests = document.querySelectorAll('.request_row');
  const noResultsMessage = document.getElementById('noResultsMessage');
  
  let hasVisibleRequest = false;

  requests.forEach(request => {
    if (request.style.display !== 'none') {
      hasVisibleRequest = true;
    }
  });

  if (hasVisibleRequest) {
    noResultsMessage.style.display = 'none'; // Masquer le message
  } else {
    noResultsMessage.style.display = 'block'; // Afficher le message
  }
}

// Appel des gestionnaires d'événements et du filtre de catégories
addEventListeners();
filterByCategory();
checkVisibleRequests(); // Vérifie s'il y a des demandes visibles au chargement
</script>
</body>
</html>
