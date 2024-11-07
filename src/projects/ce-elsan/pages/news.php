<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

// Récupération des nouvelles
require_once('../php_sql/db_connect.php');

// Configuration de la pagination
$limit = 5; // Nombre de nouvelles par page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Page actuelle
$offset = ($page - 1) * $limit; // Calcul de l'offset

// Récupération du nombre total de nouvelles
$totalSql = "SELECT COUNT(*) FROM news";
$totalQuery = $db->query($totalSql);
$totalNews = $totalQuery->fetchColumn();
$totalPages = ceil($totalNews / $limit); // Nombre total de pages

// Récupération des nouvelles pour la page actuelle
$sql = "
SELECT title, date, text
FROM news
ORDER BY date DESC
LIMIT :limit OFFSET :offset";
$query = $db->prepare($sql);
$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();
$news = $query->fetchAll(PDO::FETCH_ASSOC);

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

<div class="title_pagniation relative max-w-xl mx-auto">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" class="absolute left-0 top-0 mx-2 text-blue-800 py-2"><img class="h-12" src="../images/icons/previous.png" alt="page précédente"></a>
    <?php endif; ?>
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Actualités</h1>
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" class="absolute right-0 top-0 mx-2 text-blue-800 py-2"><img class="h-12" src="../images/icons/next.png" alt="page suivante"></a>
    <?php endif; ?>
</div>



<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 rounded">
    <div class="container">

    <?php
$first = true; // Variable de contrôle pour vérifier si c'est le premier élément
$lastElement = end($news); // Récupérer le dernier élément du tableau

foreach ($news as $new) {
    $date = new DateTime($new['date']);
    $formattedDate = $date->format('d/m/y');

    // Utiliser mt-4 pour le premier élément, mt-8 pour les suivants
    $marginTopClass = $first ? 'mt-4' : 'mt-8';
    $first = false; // Mettre à jour la variable de contrôle après le premier élément

    echo
    '<article class="' . $marginTopClass . ' m-4">
    <div class="new_row flex justify-between p-2 gap-1">
        <p class="font-semibold flex items-center">' . $formattedDate . '</p>
        <p class="truncate text-2xl font-semibold">' . $new['title'] . '</p>          
    </div>
    <p class="">' . $new['text'] . '</p>
    </article><br>';

    // Ajouter <hr> si ce n'est pas le dernier élément
    if ($new !== $lastElement) {
        echo '<hr>';
    }
}
?>




            



            
        </div>

    </div>
</section>

</main> 
   
</body>
</html>
