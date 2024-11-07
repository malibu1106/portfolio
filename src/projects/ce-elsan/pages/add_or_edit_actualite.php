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

$actualite_to_edit = null; // Initialiser la variable

if (isset($_GET['actualite_id'])) {
    require_once('../php_sql/db_connect.php');
    // Récupération de la actualite à éditer
    $sql = "
    SELECT *
    FROM news
    WHERE news_id = :actualite_id
    ";
    $query = $db->prepare($sql);
    $query->bindValue(':actualite_id', $_GET['actualite_id'], PDO::PARAM_INT);
    $query->execute();
    $actualite_to_edit = $query->fetch(PDO::FETCH_ASSOC); // Récupérer une seule ligne
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <script src="../js/login.js"></script>
    <title>Elsan</title>
</head>
<body class="pb-8">
    

    <?php include '../includes/nav.php'; ?>
    
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les actualités</h1>
    <main class="p-1 flex flex-col gap-8 lg:flex-row lg:p-4 max-w-screen-2xl mx-auto">

        <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">
            <h2 class="text-gray-100 font-bold text-3xl text-center m-4">
                <?php echo $actualite_to_edit ? 'Éditer actualité' : 'Nouvelle actualité'; ?>
            </h2>
            <form class="flex flex-col p-4" action="../php_sql/add_or_edit_actualite.php" method="POST">
            <input type="hidden" name="actualite_id" value="<?php echo $actualite_to_edit['actualite_id'] ?? ''; ?>">
                

                <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" placeholder="Titre" name="title" value="<?php echo htmlspecialchars($actualite_to_edit['title'] ?? ''); ?>" required>
                <textarea class="mb-6 h-48 text-3xl p-4 resize-none text-blue-600" id="text" name="text" placeholder="Contenu de l'actualité" required><?php echo htmlspecialchars($actualite_to_edit['text'] ?? ''); ?></textarea>
                
                <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
            </form>
        </section>
    </main>    

</body>
</html>
