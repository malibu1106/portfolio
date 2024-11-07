<?php 
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();  
}

// Connexion à la base de données
include '../php_sql/db_connect.php'; // Assurez-vous que ce chemin est correct

// Initialiser un tableau pour stocker les catégories
$categories = []; 

// Récupérer la liste des catégories
$sql = "SELECT * FROM categories";
$query = $db->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les catégories
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

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Faire une suggestion</h1>

<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto max-w-xl pb-4 text-gray-100 relative rounded">
<span class="absolute right-5 top-5 h-12 w-12"><a href="../pages/suggestions.php"><img src="../images/icons/delete_white.png" alt="fermer le popup"></a></span>

<form id="signup_form" class="flex flex-col p-4 w-[96%] mx-auto max-w-xl text-blue-600 mt-16" action="../php_sql/create_suggestion.php" method="post" enctype="multipart/form-data">
    <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" id="company_name" name="company_name" placeholder="Nom de l'entreprise" required>
    
    <textarea class="mb-6 h-48 text-3xl p-4 resize-none text-blue-600" id="description" name="description" placeholder="Description" required></textarea>
    
    <!-- Champ pour la sélection de catégorie -->
    <select name="category" id="category" class="mb-6 h-16 text-3xl text-blue-600 text-center" required>
        <option value="" disabled selected>Choisissez une catégorie</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo htmlspecialchars($category['name']); ?>">
                <?php echo ucfirst(htmlspecialchars($category['name'])); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Champ personnalisé pour l'image -->
    <div class="mb-6 h-16 flex items-center justify-center">
        <label class="bg-gray-100 text-blue-600 text-3xl p-4 cursor-pointer w-full text-center truncate" for="image_url">Ajouter l'image</label>
        <input type="file" id="image_url" name="image_url" accept="image/*" class="hidden" required>
    </div>
    
    <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" id="address" name="address" placeholder="Adresse de l'entreprise" required>
    <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
</form>

<script>
    // Sélectionner les éléments du DOM
    const imageUrlInput = document.getElementById('image_url');
    const label = document.querySelector('label[for="image_url"]');

    // Gestion du changement de fichier
    imageUrlInput.addEventListener('change', function() {
        const fileName = this.files.length > 0 ? this.files[0].name : 'Ajouter l\'image';
        label.textContent = fileName;
    });
</script>

</section>

</main> 

</body>
</html>
