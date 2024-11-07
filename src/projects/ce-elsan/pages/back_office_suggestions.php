<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
}
if (($_SESSION['role']) !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php?");
    exit();
}

include '../php_sql/db_connect.php'; // Inclure le fichier de connexion à la base de données

// Récupérer la catégorie sélectionnée
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Préparer la requête SQL avec un filtre par catégorie (utilisation du nom de la catégorie)
$sql = "
SELECT 
    s.suggestion_id, s.company_name, s.description, s.image_url, s.date, s.address, s.user_id,
    COALESCE(SUM(v.vote_value), 0) AS total_score,
    u.first_name, SUBSTRING(u.last_name, 1, 1) AS last_name_initial
FROM suggestions s
LEFT JOIN votes v ON s.suggestion_id = v.suggestion_id
LEFT JOIN users u ON s.user_id = u.user_id
LEFT JOIN categories c ON s.category = c.name";

// Ajouter un filtre si une catégorie est sélectionnée
if ($selectedCategory) {
    $sql .= " WHERE s.category = :category";
}

$sql .= " GROUP BY s.suggestion_id, u.first_name, last_name_initial ORDER BY s.date DESC";
$query = $db->prepare($sql);

// Lier le paramètre de catégorie si une catégorie a été sélectionnée
if ($selectedCategory) {
    $query->bindParam(':category', $selectedCategory, PDO::PARAM_STR);
}

$query->execute();
$suggestions = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer toutes les catégories pour le formulaire
$categoryQuery = $db->prepare("SELECT name FROM categories");
$categoryQuery->execute();
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);


// Récupérer les suggestions en attente d'approbation
$sql = "
SELECT 
    s.suggestion_id, s.company_name, s.description, s.image_url, s.date, s.address, s.user_id,
    COALESCE(SUM(v.vote_value), 0) AS total_score,
    u.first_name, SUBSTRING(u.last_name, 1, 1) AS last_name_initial
FROM suggestions s
LEFT JOIN votes v ON s.suggestion_id = v.suggestion_id
LEFT JOIN users u ON s.user_id = u.user_id
LEFT JOIN categories c ON s.category = c.name
WHERE s.is_visible = 0
GROUP BY s.suggestion_id, s.company_name, s.description, s.image_url, s.date, s.address, s.user_id, u.first_name, last_name_initial";

$query = $db->prepare($sql);
$query->execute();
$suggestions_to_approve = $query->fetchAll(PDO::FETCH_ASSOC);

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

<?php include '../includes/nav.php'; ?>

<div class="title_pagniation relative max-w-xl mx-auto">
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les suggestions</h1>
</div>

<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">

    

    <?php
if ($suggestions_to_approve) {

    
    echo '
    <h2 class="m-4 mb-6 text-3xl text-center font-bold">Suggestions en attente</h2>';
    
    foreach ($suggestions_to_approve as $suggestion_to_approve) {
        $date = new DateTime($suggestion_to_approve['date']);
        $formattedDate = $date->format('d/m/y');

        echo '<hr>
        <article class="mt-12 mb-4 w-full mx-auto">
            <div class="suggestion_row_prez flex justify-between gap-1">
                <div class="w-1/5 flex items-center justify-center">
                    <img src="' . htmlspecialchars($suggestion_to_approve['image_url']) . '" alt="logo de l\'entreprise" class="bg-white p-1 h-[50px]">
                </div>
                <div class="company_name_and_votes flex gap-2 justify-between">
                    <div class="flex flex-col text-center justify-center">
                        <p class="font-bold text-2xl">' . htmlspecialchars($suggestion_to_approve['company_name']) . '</p>
                    </div>
                </div>
                <div class="date_and_name px-2">
                    <p>' . $formattedDate . '</p>
                    <p>' . htmlspecialchars($suggestion_to_approve['first_name']) . ' ' . htmlspecialchars($suggestion_to_approve['last_name_initial']) . '.</p>
                </div>
            </div>

            <div class="flex flex-col text-center">
                <p class="mt-2">' . htmlspecialchars($suggestion_to_approve['description']) . '</p>
                <p class="mt-2">' . htmlspecialchars($suggestion_to_approve['address']) . '</p>
            </div>
            <div class="flex justify-around mt-4">
                <a href="../php_sql/change_suggestion_status.php?status=blocked&suggestion_id='.$suggestion_to_approve['suggestion_id'].'">
                    <img src="../images/icons/delete_white.png" alt"Refuser la suggestion" class="h-12 w-12">
                </a>
                <a href="../php_sql/change_suggestion_status.php?status=accepted&suggestion_id='.$suggestion_to_approve['suggestion_id'].'">
                    <img src="../images/icons/checked.png" alt"Accepter la suggestion" class="h-12 w-12">
                </a>
            </div>
        </article>';
    }

    
}
?>

</section><section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">

<h3 class="font-bold text-xl text-center bg-white text-blue-600 rounded p-2">
        <a href="add_suggestion.php">+ Faire une suggestion</a>
    </h3>








    <h2 class="m-4 mt-12 text-3xl text-center font-bold">Toutes les suggestions</h2>
    <form method="GET" action="" class="flex justify-center m-4">

        <select name="category" id="category" class="border p-2 rounded w-[90%]  text-blue-600" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['name']) ?>" <?= $selectedCategory == $category['name'] ? 'selected' : '' ?>>
                    <?= ucfirst(htmlspecialchars($category['name'])) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="container">

    <?php
    $lastSuggestion = end($suggestions); // Récupérer le dernier élément du tableau

    if ($suggestions) {
        foreach ($suggestions as $suggestion) {
            $date = new DateTime($suggestion['date']);
            $formattedDate = $date->format('d/m/y');

            echo
            '<hr><article class="mt-4 mb-4 w-full mx-auto">
            <div class="suggestion_row_prez flex justify-between gap-1">
                <div class="w-1/5 flex items-center justify-center">
                    <img src="' . $suggestion['image_url'] . '" alt="logo de l\'entreprise" class="bg-white p-1 h-[50px]">
                </div>
                <div class="company_name_and_votes flex gap-2 justify-between">

                    <div class="flex flex-col text-center justify-center">
                        <p class="font-bold text-2xl">' . $suggestion['company_name'] . '</p>
                        <p class="text-xl">' . $suggestion['total_score'] . '</p>                                               
                    </div>

                </div>
                <div class="date_and_name px-2">
                    <p class="">' . $formattedDate . '</p>
                    <p class="">' . $suggestion['first_name'] . ' ' . $suggestion['last_name_initial'] . '.</p>                    
                </div>
                        
            </div>

            <div class="flex flex-col text-center">
            <p class="mt-2">'.$suggestion['description'].'</p>
            <p class="mt-2">'.$suggestion['address'].'</p>
            <div>

            <div class="flex mt-4 px-8 justify-between items-center">
                    <a href="edit_suggestion.php?suggestion_id='.$suggestion['suggestion_id'].'">
                        <img src="../images/icons/edit.png" class="h-8 w-8" alt="editer la suggestion">
                    </a>
                    <img src="../images/icons/delete_white.png" class="h-8 w-8 delete_suggestion" alt="supprimer la suggestion">
                <div class="confirm_delete_suggestion">
                    <a href="../php_sql/delete_suggestion.php?suggestion_id='.$suggestion['suggestion_id'].'">
                      <img src="../images/icons/cancel.png" class="h-8 w-8" alt="Confirmer la suppression de la suggestion">
                    </a>
                </div>
                </div>

            </article>';
        }
    } else {
        echo '<p class="text-center mt-4">Aucune suggestion trouvée pour cette catégorie.</p>';
    }
    ?>
        </div>

    </div>
</section>

</main> 


<script>
  // Fonction pour ajouter les gestionnaires d'événements
function addEventListeners() {
  document.querySelectorAll('.delete_suggestion').forEach((deleteBtn, index) => {
    const confirmDelete = document.querySelectorAll('.confirm_delete_suggestion')[index]; // Récupère la zone de confirmation
    const cancelDelete = document.querySelectorAll('.cancel_delete_suggestion')[index]; // Récupère le bouton d'annulation

    deleteBtn.addEventListener('click', () => {
      deleteBtn.style.display = 'none';  // Masque le bouton de suppression
      confirmDelete.style.display = 'block'; // Affiche la confirmation de suppression
      cancelDelete.style.display = 'block'; // Affiche le bouton d'annulation
    });

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
