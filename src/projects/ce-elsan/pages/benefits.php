<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

require_once('../php_sql/db_connect.php');

// Vérification si une catégorie a été sélectionnée
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

// Récupération des permanences avec des dates à venir
$sql = "SELECT * FROM benefits";
if ($categoryFilter) {
    $sql .= " WHERE category = :category";
}

$query = $db->prepare($sql);
if ($categoryFilter) {
    $query->bindParam(':category', $categoryFilter, PDO::PARAM_STR);
}
$query->execute();
$benefits = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupération des catégories
$categoriesQuery = $db->query("SELECT name FROM categories");
$categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <script src="../js/script.js"></script>
  <title>Elsan</title>
</head>
<body class="pb-8">

<?php include '../includes/nav.php';?>

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Vos avantages</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto max-w-xl text-gray-100 pb-8 relative rounded" id="benefitsSection">
    <div class="filter p-4">
    <form method="GET" action="">
        <select name="category" class="category-select text-blue-600 w-full h-12 font-bold text-xl text-center" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            <?php
            // Affichage des catégories dynamiquement
            foreach ($categories as $category) {
                echo '<option value="' . htmlspecialchars($category['name']) . '" ' . ($categoryFilter == $category['name'] ? 'selected' : '') . '>' . htmlspecialchars(ucfirst($category['name'])) . '</option>';
            }
            ?>
        </select>
    </form>
    </div>  
    
    <div class="container flex flex-wrap justify-center" id="benefitsList">
    <?php
    if (empty($benefits)) {
        // Affichage du message si aucune demande n'est trouvée
        echo '<p class="text-white text-lg text-center mt-4">Aucun résultat disponible.</p>';
    } else {
    foreach ($benefits as $benefit) {
        // Affichage de l'avantage
        echo
            '<div class="benefit w-1/3 flex flex-col p-2 items-center mt-8" onclick="showBenefitDetails(`' . htmlspecialchars($benefit['company_name']) . '`, `' . htmlspecialchars($benefit['address']) . '`, `' . htmlspecialchars($benefit['image_url']) . '`, `' . htmlspecialchars($benefit['description']) . '`)">
                <img class="h-16 w-16 bg-white p-1" src="' . htmlspecialchars($benefit['image_url']) . '" alt="logo de l\'entreprise">
                ' . htmlspecialchars($benefit['company_name']) . '
            </div>';
    }}
    ?>
    </div>
</section>
    
</main> 

<script>
function showBenefitDetails(companyName, address, imageUrl, description) {
    const benefitsSection = document.getElementById("benefitsSection");
    
    // Remplacer le contenu de la section par les détails du bénéfice
    benefitsSection.innerHTML = `
    <div class="container">
        <span onclick="goBack()" class="absolute right-5 top-5 h-12 w-12"><img src="../images/icons/delete_white.png" alt="fermer le popup" class=" close_icon"></span>
        <div class="text-center mt-20">
            <h2 class="text-xl font-bold">${companyName}</h2>
            <p>${address}</p>
            <img src="${imageUrl}" alt="Image de ${companyName}" class="bg-white p-2 mx-auto my-4 max-w-[50%] mt-8">
            <p class="mt-8 max-w-[88%] mx-auto">${description}</p>
        </div>
    </div>
    `;
}

function goBack() {
    // Recharge la page pour revenir à la liste des avantages
    window.location.reload();
}
</script>

</body>
</html>