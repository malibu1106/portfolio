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
// Récupération des permanences avec des dates à venir
$sql = "
SELECT *
FROM permanences
WHERE STR_TO_DATE(date, '%d/%m/%y') >= CURDATE()
ORDER BY STR_TO_DATE(date, '%d/%m/%y') ASC;
";
$query = $db->prepare($sql);
$query->execute();
$permanences = $query->fetchAll(PDO::FETCH_ASSOC);

// Initialisation de la variable pour le mois courant
$currentMonth = '';

// Tableau des mois en français
$months = [
    1 => 'janvier',
    2 => 'février',
    3 => 'mars',
    4 => 'avril',
    5 => 'mai',
    6 => 'juin',
    7 => 'juillet',
    8 => 'août',
    9 => 'septembre',
    10 => 'octobre',
    11 => 'novembre',
    12 => 'décembre'
];
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

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les permanences</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">
<h3 class="font-bold text-xl text-center bg-white text-blue-600 rounded p-2"><a href="add_or_edit_permanence.php">+ Ajouter une permanence</a></h3>
    <div class="container">

    <?php
$lastPermanence = end($permanences); // Récupérer la dernière permanence du tableau
$currentMonth = ''; // Initialisation du mois courant

foreach ($permanences as $permanence) {
    // Récupération du mois et de l'année
    $date = DateTime::createFromFormat('d/m/y', $permanence['date']);
    $monthYear = $months[(int)$date->format('n')];

    // Vérification si nous avons changé de mois
    if ($monthYear !== $currentMonth) {
        // Si on a déjà un mois courant, ajouter un <hr> avant de changer de mois
        if ($currentMonth !== '') {
            echo '<hr>'; // Ajout de la ligne de séparation à la fin du mois
        }
        // Mettre à jour le mois courant
        $currentMonth = $monthYear;
        // Afficher le nouvel en-tête de mois
        echo '<h2 class="text-xl font-semibold text-white text-center m-4">'.ucfirst($currentMonth).'</h2>';
    }

// Affichage de la permanence
echo '<div class="permanence_row flex justify-between p-2">
    <div class="container flex justify-between w-3/4">
            <p class="w-1/3">'.$permanence['date'].'</p>
            <p class="w-1/3 text-center">'.$permanence['time'].'</p>
            <p class="w-1/3 text-end">'.$permanence['representative'].'</p>
    </div>
    <div class="container flex justify-end gap-4 w-1/4">
        <a href="add_or_edit_permanence.php?permanence_id='.$permanence['permanence_id'].'">
          <img src="../images/icons/edit.png" class="h-8 w-8" alt="editer la permanence">
        </a>
        <img src="../images/icons/delete_white.png" class="h-8 w-8 delete_permanence" alt="supprimer la permanence">
        <div class="confirm_delete_permanence">
            <a href="../php_sql/delete_permanence.php?permanence_id='.$permanence['permanence_id'].'">
              <img src="../images/icons/cancel.png" class="h-8 w-8" alt="Confirmer la suppression de la permanence">
            </a>
        </div>
        
    </div>    
</div>
<p class="cancel_delete_permanence text-center m-2 font-bold text-red-200">Annuler la suppression</p>';
}

// Ajouter un <hr> à la fin si ce n'est pas la dernière permanence
if ($permanence !== $lastPermanence) {
    echo '<hr>';
}
?>

           
    </div>
</section>
    
</main> 

<script>
  // Fonction pour ajouter les gestionnaires d'événements
function addEventListeners() {
  // Gestion des événements pour supprimer une permanence
  document.querySelectorAll('.delete_permanence').forEach((deleteBtn, index) => {
    const confirmDelete = document.querySelectorAll('.confirm_delete_permanence')[index]; // Récupère la zone de confirmation
    const cancelDelete = document.querySelectorAll('.cancel_delete_permanence')[index]; // Récupère le bouton d'annulation

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
