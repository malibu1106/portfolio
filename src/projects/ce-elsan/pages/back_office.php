<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();}
if (($_SESSION['role']) !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php?");
    exit();}

    include '../php_sql/db_connect.php'; // Inclure le fichier de connexion à la base de données

    // Récupérer les utilisateurs en attente d'approbation
    $sql = "SELECT COUNT(*) as users_count FROM users WHERE role = 'to_approve'";
    $query = $db->prepare($sql);
    $query->execute();
    $users_to_approve = $query->fetch(PDO::FETCH_ASSOC);

    // Récupérer les suggestions en attente d'approbation
    $sql = "SELECT COUNT(*) as suggestions_count FROM suggestions WHERE is_visible = 0";
    $query = $db->prepare($sql);
    $query->execute();
    $suggestions_to_approve = $query->fetch(PDO::FETCH_ASSOC);

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

<h1 class="text-blue-600 font-bold text-4xl text-center m-8 2xl:mt-32">Page de gestion</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto 2xl:flex-row 2xl:gap-24 2xl:justify-between 2xl:p-12">



<div class="container mx-auto max-w-xl flex flex-col gap-8">
<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center relative rounded">
        <a href="back_office_users.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les utilisateurs</h3>
        </a>
        <?php
        if ($users_to_approve && $users_to_approve['users_count'] > 0){
            echo '<span class="absolute bg-red-600 -right-4 -top-4 h-12 w-12 flex justify-center items-center text-3xl font-bold text-white rounded-full">';
            echo $users_to_approve['users_count'];
            echo '</span>';
        }

        ?>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center rounded">
        <a href="back_office_permanences.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les permanences</h3>
        </a>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center rounded">
        <a href="back_office_news.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les actualités</h3>
        </a>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center relative rounded">
        <a href="back_office_suggestions.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les suggestions</h3>
        </a>
        <?php
        if ($suggestions_to_approve && $suggestions_to_approve['suggestions_count'] > 0){
            echo '<span class="absolute bg-red-600 -right-4 -top-4 h-12 w-12 flex justify-center items-center text-3xl font-bold text-white rounded-full">';
            echo $suggestions_to_approve['suggestions_count'];
            echo '</span>';
        }

        ?>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center rounded">
        <a href="back_office_benefits.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les avantages</h3>
        </a>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl h-16 flex items-center justify-center rounded">
        <a href="back_office_current_requests.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center">Gérer les demandes</h3>
        </a>
    </section>
</div>      
</main> 
   
    

</body>
</html>
