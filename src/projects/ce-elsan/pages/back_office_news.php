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
// Récupération des actualites avec des dates à venir
$sql = "SELECT news_id, title, date FROM news";
$query = $db->prepare($sql);
$query->execute();
$actualites = $query->fetchAll(PDO::FETCH_ASSOC);
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

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les actualités</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">
<h3 class="font-bold text-xl text-center mb-4 bg-white text-blue-600 rounded p-2"><a href="add_or_edit_actualite.php">+ Ajouter une actualité</a></h3>
    <div class="container">

    <?php


foreach ($actualites as $actualite) {
  // Transformation de la date
  $date = new DateTime($actualite['date']);
  $formatted_date = $date->format('d/m/y');

  // Affichage de l'actualite
  echo '<div class="actualite_row flex justify-between p-2">
      <div class="container flex justify-center w-3/4">
          <p class="w-1/4">'.$formatted_date.'</p>
          <p class="w-3/4 text-center truncate">'.$actualite['title'].'</p>
      </div>
      <div class="container flex justify-end gap-4 w-1/4">
          <a href="add_or_edit_actualite.php?actualite_id='.$actualite['news_id'].'">
            <img src="../images/icons/edit.png" class="h-8 w-8" alt="editer l\'actualite">
          </a>
          <img src="../images/icons/delete_white.png" class="h-8 w-8 delete_actualite" alt="supprimer l\'actualite">
          <div class="confirm_delete_actualite">
              <a href="../php_sql/delete_actualite.php?actualite_id='.$actualite['news_id'].'">
                <img src="../images/icons/cancel.png" class="h-8 w-8" alt="Confirmer la suppression de l\'actualite">
              </a>
          </div>
      </div>    
  </div>
  <p class="cancel_delete_actualite text-center m-2 font-bold text-red-200">Annuler la suppression</p>';
}

?>

           
    </div>
</section>
    
</main> 

<script>
  // Fonction pour ajouter les gestionnaires d'événements
function addEventListeners() {
  // Gestion des événements pour supprimer une actualite
  document.querySelectorAll('.delete_actualite').forEach((deleteBtn, index) => {
    const confirmDelete = document.querySelectorAll('.confirm_delete_actualite')[index]; // Récupère la zone de confirmation
    const cancelDelete = document.querySelectorAll('.cancel_delete_actualite')[index]; // Récupère le bouton d'annulation

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

// Appel des gestionnaires d'événements
addEventListeners();
</script>
</body>
</html>
