<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

// RECUPERATION PERMANENCES
require_once('../php_sql/db_connect.php');
$sql = "
    SELECT *
    FROM permanences
    WHERE STR_TO_DATE(date, '%d/%m/%y') > CURDATE()
    ORDER BY STR_TO_DATE(date, '%d/%m/%y') ASC
    LIMIT 3;
";
$query = $db->prepare($sql);
$query->execute();
$permanences = $query->fetchAll(PDO::FETCH_ASSOC);


    // RECUPERATION NEWS

    $sql = "
    SELECT title,date
    FROM news
    ORDER BY date DESC
    LIMIT 3;
    ";
    $query = $db->prepare($sql);
    $query->execute();
    $news = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Récupération des suggestions avec score total

    $sql = "
    SELECT s.company_name, s.date, COALESCE(SUM(v.vote_value), 0) AS total_score
    FROM suggestions s
    LEFT JOIN votes v ON s.suggestion_id = v.suggestion_id
    GROUP BY s.suggestion_id
    ORDER BY s.date DESC
    LIMIT 3;
    ";

    $query = $db->prepare($sql);
    $query->execute();
    $suggestions = $query->fetchAll(PDO::FETCH_ASSOC);

    require_once('../php_sql/db_disconnect.php');

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

<h1 class="text-blue-600 font-bold text-4xl text-center m-8 ">Bonjour <?=$_SESSION['first_name']?> !</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 rounded">
    

    <div class="section_title flex justify-between p-2">
        <h3 class="font-bold text-xl bg-white text-blue-600 rounded p-2">Permanences</h3>
        <a href="permanences.php" class="font-semibold bg-white text-blue-600 rounded p-2">Tout voir</a>        
    </div>
    <div class="container">

        <?php
        foreach ($permanences as $permanence) {
        echo
        '<div class="permanence_row flex justify-between p-2">
            <p class="w-1/3 text-start">'.$permanence['date'].'</p>
            <p class="w-1/3 text-center">'.$permanence['time'].'</p>
            <p class="w-1/3 text-end truncate">'.$permanence['representative'].'</p>            
        </div>';}
        ?>
           
    </div>

</section>

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 rounded">
    <div class="section_title flex justify-between p-2">
        <h3 class="font-bold text-xl bg-white text-blue-600 rounded p-2">Actualités</h3>
        <a href="news.php" class="font-semibold bg-white text-blue-600 rounded p-2">Tout voir</a>        
    </div>
    <div class="container">

        <?php
        foreach ($news as $new) {
            $date = new DateTime($new['date']);
            $formattedDate = $date->format('d/m/y');
        echo
        '<div class="permanence_row flex justify-between p-2 gap-1">
            <p class="">'.$formattedDate.'</p>
            <a href="news.php"><p class="truncate">'.$new['title'].'</p></a>     
        </div>';}
        ?>
           
    </div>

</section>

<section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 rounded">
    <div class="section_title flex justify-between p-2">
        <h3 class="font-bold text-xl bg-white text-blue-600 rounded p-2">Suggestions</h3>
        <a href="suggestions.php" class="font-semibold bg-white text-blue-600 rounded p-2">Tout voir</a>        
    </div>

    <div class="container">

        <?php
        foreach ($suggestions as $suggestion) {
            $date = new DateTime($suggestion['date']);
            $formattedDate = $date->format('d/m/y');
        echo
        '<div class="permanence_row flex justify-between p-2">
            <p class="w-1/3 text-start">'.$formattedDate.'</p>
            <p class="w-1/3 text-center truncate">'.$suggestion['company_name'].'</p>
            <p class="w-1/3 text-end">'.$suggestion['total_score'].'</p>            
        </div>';}
        ?>
           
    </div>

</section>

<div class="h-0">
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl rounded">
        <a href="benefits.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center m-4">Vos avantages</h3>
        </a>
    </section>
    <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl mt-4 rounded">
        <a href="current_requests.php">
            <h3 class="text-gray-100 font-bold text-3xl text-center m-4">Vos demandes</h3>
        </a>
    </section>
</div>      
</main> 
   
    

</body>
</html>
