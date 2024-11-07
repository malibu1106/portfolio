<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

// Récupération des suggestions avec score total et pagination
require_once('../php_sql/db_connect.php');

// Configuration de la pagination
$limit = 5; // Nombre de suggestions par page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Page actuelle
$offset = ($page - 1) * $limit; // Calcul de l'offset

// Récupération du nombre total de suggestions
$totalSql = "SELECT COUNT(*) FROM suggestions";
$totalQuery = $db->query($totalSql);
$totalSuggestions = $totalQuery->fetchColumn();
$totalPages = ceil($totalSuggestions / $limit); // Nombre total de pages

// Récupération des suggestions avec pagination, votes et informations utilisateur
$sql = "
SELECT 
    s.suggestion_id, s.company_name, s.description, s.image_url, s.date, s.address, s.user_id,
    COALESCE(SUM(v.vote_value), 0) AS total_score,
    u.first_name, SUBSTRING(u.last_name, 1, 1) AS last_name_initial
FROM suggestions s
LEFT JOIN votes v ON s.suggestion_id = v.suggestion_id
LEFT JOIN users u ON s.user_id = u.user_id
WHERE s.is_visible = 1
GROUP BY s.suggestion_id, u.first_name, last_name_initial
ORDER BY s.date DESC
LIMIT :limit OFFSET :offset";

$query = $db->prepare($sql);
$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();
$suggestions = $query->fetchAll(PDO::FETCH_ASSOC);

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
        <a href="?page=<?= $page - 1 ?>" class="absolute left-0 top-0 mx-2 text-blue-600 py-2"><img class="h-12" src="../images/icons/previous.png" alt="page précédente"></a>
    <?php endif; ?>
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Suggestions</h1>
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" class="absolute right-0 top-0 mx-2 text-blue-600 py-2"><img class="h-12" src="../images/icons/next.png" alt="page suivante"></a>
    <?php endif; ?>
</div>



<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">

        <h3 class="font-bold text-xl text-center bg-white text-blue-600 rounded p-2"><a href="add_suggestion.php">+ Faire une suggestion</a></h3>

    <div class="container">

    <?php
$lastSuggestion = end($suggestions); // Récupérer le dernier élément du tableau

foreach ($suggestions as $suggestion) {
    $date = new DateTime($suggestion['date']);
    $formattedDate = $date->format('d/m/y');

    echo
    '<article class="mt-12 w-full mx-auto">
    <div class="suggestion_row_prez flex justify-between gap-1">
        <div class="w-1/5 flex items-center justify-center">
            <img src="' . $suggestion['image_url'] . '" alt="logo de l\'entreprise" class="bg-white p-1 h-[50px]">
        </div>
        <div class="company_name_and_votes flex gap-2 justify-between">
            <div class="left font-bold text-4xl flex items-center">
                <a href="../php_sql/vote.php?vote=-1&suggestion_id=' . $suggestion['suggestion_id'] . '&page=' . $page . '">
                    <img src="../images/icons/down.png" alt="vote négatif" class="h-8 w-8">
                </a>
            </div>
            <div class="flex flex-col text-center justify-center">
                <p class="">' . $suggestion['company_name'] . '</p>
                <p class="">' . $suggestion['total_score'] . '</p>                                               
            </div>
            <div class="right font-bold text-4xl flex items-center">
                <a href="../php_sql/vote.php?vote=1&suggestion_id=' . $suggestion['suggestion_id'] . '&page=' . $page . '">
                    <img src="../images/icons/up.png" alt="vote positif" class="h-8 w-8">
                </a>
            </div>
        </div>
        <div class="date_and_name px-2">
            <p class="">' . $formattedDate . '</p>
            <p class="">' . $suggestion['first_name'] . ' ' . $suggestion['last_name_initial'] . '.</p>                    
        </div>        
    </div>
    <p class="mt-2 px-8">' . $suggestion['description'] . '</p>
    <p class="text-center mt-2 italic">' . $suggestion['address'] . '</p>
    </article><br>';

    // Ajouter <br><hr> si ce n'est pas le dernier élément
    if ($suggestion !== $lastSuggestion) {
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
